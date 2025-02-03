$("#login").click(function() {
    var pas1 = $("#p1").val();
    var pas2 = $("#p2").val();

    if (pas1 !== "" && pas2 !== "") {
        if(pas1 == pas2) {
            alert("matches");
        } else {
            alert("not matches");
        }

    } else {
        alert("please enter your password");
    }

});