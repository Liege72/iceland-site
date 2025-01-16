let COLORS = ["#ff6900", "#fcba03", "#ff7d45", "#ff5454", "#36b2ff", "#4073ff", "#8a58db", "#e45eff", "#ff5ec7"];

/**
 * @returns a random hex color from the COLORS array
 */
function getRandomColor() {
    let color = COLORS[Math.floor(Math.random() * COLORS.length)];
    return color;
}

/**
 * Toggles the compact/cozy mode for the comments page
 * @param type type of mode to toggle; ONLY "compact" or "cozy"
 */
function toggleMode(type) {
    let commentsDiv = document.getElementById("comments");
    let comments = document.getElementsByClassName("comment");
    let commentsText = commentsDiv.getElementsByTagName("p");
    let commentUserImages = commentsDiv.getElementsByClassName("comment-user-img");
    let commentsB = commentsDiv.getElementsByTagName("b");

    if (type == "compact") {
        commentsDiv.style.gap = "2px"

        for (let i = 0; i < comments.length; i++) {
            comments[i].style.backgroundColor = "white";
            comments[i].style.padding = "10px 0";
            comments[i].style.gap = "10px"
            comments[i].style.borderRadius = "0";

            if (i == 0) {
                comments[i].style.borderTop = "1px solid black";
            } else if (i == comments.length - 1) {
                comments[i].style.borderBottom = "1px solid black";
            }
            comments[i].style.borderBottom = "1px solid black";;
        }
        for (let i = 0; i < commentsText.length; i++) {
            commentsText[i].style.margin = "0";
        }
        for (let i = 0; i < commentUserImages.length; i++) {
            commentUserImages[i].style.display = "none";
        }
        for (let i = 0; i < commentsB.length; i++) {
            commentsB[i].style.height = "auto";
        }
    } else if (type == "cozy") {
        commentsDiv.removeAttribute("style");
        for (let i = 0; i < comments.length; i++) {
            comments[i].removeAttribute("style");
        }
        for (let i = 0; i < commentsText.length; i++) {
            commentsText[i].removeAttribute("style");
        }
        for (let i = 0; i < commentUserImages.length; i++) {
            commentUserImages[i].removeAttribute("style");
            commentUserImages[i].style.backgroundColor = getRandomColor();
        }
        for (let i = 0; i < commentsB.length; i++) {
            commentsB[i].removeAttribute("style");
        }

    }
}

/*
    === NOTE TO PROF ===

    I dont remember covering this in class, but I did reference the documents 
    you put on myCourses. I hope this is okay!

    Also, I want you to know that I am aware of the potential risks of this. 
    Ideally, I would implement some sort ratelimiter to prevent abuse. 
    Additionally, a login would allow only one like per account, but I thought
    that was too much!    
*/

/**
 * Toggles a like for a comment
 * @param commentId id of the comment to be liked/unliked 
 */
function toggleCommentLike(commentId) {
    let likeImg = document.getElementById("like-icon-" + commentId);
    let likeCount = document.getElementById("like-count-" + commentId);
    let isLiked = likeImg.src.endsWith("/assets/images/heart-full.png");

    if (!isLiked) {
        likeImg.src = "./assets/images/heart-full.png";
        likeCount.textContent = parseInt(likeCount.textContent) + 1;
    } else {
        likeImg.src = "./assets/images/heart-empty.png";
        likeCount.textContent = parseInt(likeCount.textContent) - 1;
    }

    let http = new XMLHttpRequest();

    // is liked as int because bools are weird in php??
    isLikedInt = !isLiked ? 1 : 0;

    // data to be POSTed
    let data = JSON.stringify({
        commentId: commentId,
        isLiked: isLikedInt 
    });

    // http post request
    http.open("POST", "comments.php", true);
    // content type is json like the obj above
    http.setRequestHeader("Content-Type", "application/json");
    // handle request; will alert if fails
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200) {
            let response = JSON.parse(http.responseText);
            if (!response.success) {
                alert("Error: " + response.message);
            }
        }
    }
    // send the req with the data
    http.send(data);
}

/**
 * Get the current weather from the API with the provided url; location is UID.
 * @param url url to get the weather from
 * @param location location to set the weather for
 */
function getCurrentWeather(url, location) {
    let http = new XMLHttpRequest();

    http.open("GET", url, true);
    http.onreadystatechange = function() {
        if (http.readyState === 4 && http.status === 200) {
            let response = JSON.parse(http.responseText);
            let temp = response.hourly.temperature_2m[0];
            let vis = response.hourly.visibility[0];
            let wind = response.hourly.wind_speed_10m[0];
            let uv = response.hourly.uv_index[0];

            // set values
            document.getElementById(location + "-temp").textContent = temp + " °C";
            document.getElementById(location+ "-visibility").textContent = vis + " m";
            document.getElementById(location + "-wind").textContent = wind + " km/h";
            document.getElementById(location + "-uvindex").textContent = uv;
        }
    };
    http.send();
}