function openJobContent(jobId) {
    var x = document.getElementById("job" + jobId);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
