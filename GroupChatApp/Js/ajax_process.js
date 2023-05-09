    
    showMessage();
    allUsers();
    setInterval(function(){ showMessage(); allUsers(); },1000);


    // SEND MESSAGE
    function sendMessage()
    {
        var message = document.getElementById('message').value;
        var object;
        if(window.ActiveXObject)
        {
            object = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
            object = new XMLHttpRequest();
        }

        object.onreadystatechange = function()
        {
            if(object.readyState == 4 && object.status == 200)
            {
                // alert(object.responseText);
                // console.log(object.responseText);
                showMessage();
                document.getElementById('message').value = "";
            }
        }

        object.open("POST", "c_app_process.php");
        object.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        object.send("action=send_message&message="+message);
    }

    // SHOW MESSAGE
    function showMessage()
    {
        var object;
        if(window.ActiveXObject)
        {
            object = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
            object = new XMLHttpRequest();
        }

        object.onreadystatechange = function()
        {
            if(object.readyState == 4 && object.status == 200)
            {
                document.getElementById('show_message').innerHTML = object.responseText;
                // alert(object.responseText);
                // console.log(object.responseText);
            }
        }

        object.open("GET", "c_app_process.php?action=show_message");
        object.send();
    }

    // ALL USERS
    function allUsers()
    {
        var object;
        if(window.ActiveXObject)
        {
            object = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
            object = new XMLHttpRequest();
        }

        object.onreadystatechange = function()
        {
            if(object.readyState == 4 && object.status == 200)
            {
                document.getElementById('all_users').innerHTML = object.responseText;
                // alert(object.responseText);
                // console.log(object.responseText);
            }
        }

        object.open("GET", "c_app_process.php?action=all_users");
        object.send();
    }