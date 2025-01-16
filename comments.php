<?php
    $pageTitle = "Comments | Iceland";

    echo "<script>document.title = '".$pageTitle."';</script>";
    include("assets/inc/header.inc.php");

    include("/home/MAIN/redacted/dbConn.php");

    // sanitize input
    function sanitize($str, $length=50) {
        $str = trim($str);
        $str = htmlentities($str, ENT_QUOTES);
        return substr($str, 0, $length);
    }

    function alphaNumericSpacePunctuation($value) {
        $reg = '/^[A-Za-z0-9 !-~]+$/';
        return preg_match($reg,$value);
    }

    function integer($value) {
        $reg = "/(^-?\d\d*$)/";
        return preg_match($reg,$value);
    }

    // handle comment
    if (array_key_exists("name", $_POST) && array_key_exists("comment", $_POST)) {
        // sanitize input
        $name = sanitize($_POST["name"]);
        $comment = sanitize($_POST["comment"], 500);

        // validate input
        if (alphaNumericSpacePunctuation($name) == 0 || alphaNumericSpacePunctuation($comment) == 0) {
            echo "<script>alert('Invalid input!');</script>";
            echo "<script>window.location.href = 'comments.php';</script>";
            return;
        }

        // insert comment into database
        if ($name && $comment) {
            $stmt = $mysql->prepare("INSERT INTO comments (`name`, `comment`) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $comment);
            $stmt->execute();
            $stmt->close();

            // refresh page
            echo "<script>window.location.href = 'comments.php';</script>";
        } else {
            echo "<script>alert('Invalid input!');</script>";
            echo "<script>window.location.href = 'comments.php';</script>";
        }
    }

    // check if is post
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // get data as json from req -- php manual helped here!
        $data = json_decode(file_get_contents("php://input"), true);
        // check if each field is not null
        if (isset($data["commentId"]) && isset($data["isLiked"])) {            
            $commentId = $data["commentId"];
            $isLiked = $data["isLiked"];

            // integer validation
            if (!integer($commentId) || !integer($isLiked)) {
                echo "<script>alert('Invalid input!');</script>";
                echo "<script>window.location.href = 'comments.php';</script>";
                return;
            }

            // make integers
            $commementId = intval($commentId);
            $isLiked = intval($isLiked);
    
            // if 1 (true) -- else 0 (false)
            if ($isLiked === 1) {
                $stmt = $mysql->prepare("UPDATE comments SET likes = likes + 1 WHERE id = ?");
            } else if ($isLiked === 0) {
                $stmt = $mysql->prepare("UPDATE comments SET likes = likes - 1 WHERE id = ?");
            }
            $stmt->bind_param("i", $commentId);
            $success = $stmt->execute();
            $stmt->close();

            return;
        }
    }
?>

<main id="comments-page">
    <div id="comments-container">
        <h2>Comment something</h2>
        <form id="comment-form" action="comments.php" method="post" onsubmit="validateForm(event)">
            <div class="comment-field">
                <label for="name">Name</label><input type="text" id="name" name="name" required>
            </div>
            <div class="comment-field">
                <label for="comment">Comment</label><textarea id="comment" name="comment" required></textarea>
            </div>
            <input id="form-btn" type="submit" value="Submit">
        </form>
        <hr>
        <div class="comments-header">
            <h2>Comments</h2>
            <div class="mode-slider">
                <input type="radio" id="compact-switch" name="mode-slider" onclick="toggleMode('compact')" checked>
                <label for="compact-switch"><img src="./assets/images/compact.svg" alt="compact switch" id="compact-switch-img"></label>
                <input type="radio" id="cozy-switch" name="mode-slider" onclick="toggleMode('cozy')" checked>
                <label for="cozy-switch"><img src="./assets/images/cozy.svg" alt="cozy switch" id="cozy-switch-img"></label>
                <span class="mode-slider-background"></span>
            </div>
        </div>
        <div id="comments">
            <?php
                // query for all comments; order by newest first
                $result = $mysql->query("SELECT * FROM comments ORDER BY `date` DESC");
                $comments = $result->fetch_all();
                // iterate through all comments and display
                for ($i = 0; $i < count($comments); $i++) {     
                    ?>
                    <div class="comment">
                        <div class="comment-content">
                            <div class="comment-header">
                                <div class="comment-user-img" id="comment-<?php echo $comments[$i][0] ?>"><?php echo $comments[$i][1][0]?></div>                        
                                <div class="comment-name-time">         
                                    <b><?php echo $comments[$i][1]; ?></b>
                                    <span id="comment-time">
                                        <?php
                                        // w3 showed me how to do this
                                        $date = new DateTime($comments[$i][4]);
                                        echo $date->format('g:i A m/d/Y');
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <p><?php echo $comments[$i][2]; ?></p>
                        </div>
                        <div class="comment-like">
                            <span id="like-count-<?php echo $comments[$i][0] ?>"><?php echo $comments[$i][3] ?></span>
                            <button type="button" onclick="toggleCommentLike(<?php echo $comments[$i][0]?>)">
                                <img class="like-icon" id="like-icon-<?php echo $comments[$i][0] ?>" 
                                    src="./assets/images/heart-empty.png" alt="like icon">                      
                            </button>
                        </div>
                    </div>
                    <script>
                           document.getElementById("comment-<?php echo $comments[$i][0] ?>").style.backgroundColor = getRandomColor();
                    </script>
                    <?php
                }
            ?>
        </div>
    </div>
</main>

<?php
    include("assets/inc/footer.inc.php");
?>