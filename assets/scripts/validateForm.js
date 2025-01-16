/**
 * Validates the data in the comment form
 * @returns false if validation fails
 */
function validateForm(event) {
    // stop form from submitting
    event.preventDefault(); 

    let form = document.getElementById("comment-form");
    let name = form["name"].value.trim();
    let comment = form["comment"].value.trim();

    if (name.length === 0) {
        alert("You must enter a name!");
        return false;
    } else if (name.length > 30) {
        alert("Your name must be less than 31 characters long!");
        return false;
    } else if (comment.length < 3) {
        alert("Your comment must be at least 3 characters long!");
        return false;
    }

    form.submit();
}