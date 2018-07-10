<!--
<link type="text/css" href="chat.css" rel="stylesheet">
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">-->

<script>
    function checkonline() {
        var os = document.getElementById("onoroff").value;
        if (os == 1)
            document.getElementById("online").style.color = "chartreuse";
        if (os == 0)
            document.getElementById("online").style.color = "red";
    }

    function send() {
        var elem = document.getElementById('msg');
        var msg = elem.value;
        var toid = document.getElementById("to").value; {
            var x = new XMLHttpRequest;
            x.open("GET", "boot3/send.php?msg=" + msg + "&toid=" + toid);
            x.send();
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('box').innerHTML = this.responseText;
                }
            }
        }
        checkonline();
        document.getElementById("msg").value = "";

    }

    function message(to, e) {
        var toname = e.innerHTML;
        document.getElementById("to").value = to;
        document.getElementById("toname").innerHTML = toname;
        var elem1 = document.getElementById("chat");
        var elem2 = document.getElementById('box');
        //        elem1.style.display = "block";
        //        elem2.style.display = "block";
        show(elem1);
        show(elem2);
        document.getElementById("msg").value = "";
        send();


    }

    function hidebox() {
        var elem = document.getElementById("chat")
        hide(elem)
    }

    function show(e) {
        e.style.display = "block";
        return;
    }

    function hide(e) {
        e.style.display = "none";
        return;
    }

</script>
<footer class="foot" id="chat" style="display:none">

    <h2 class="btn btn-info btn-block to" id="chatheader">Message To<span id="online" class="glyphicon glyphicon-globe"></span>
        <span onclick="hidebox()" class="glyphicon glyphicon-remove c"></span>
        <span class="glyphicon glyphicon-minus m"></span>
        <p id="toname"></p>
        <input type="hidden" id="to" />
    </h2>
    <div class="box" id="box">

        <!--Messages will load on ajax call-->

    </div>
    <button onclick=send() class="btn btn-success sendmsg">Send</button>

    <input type="text" class="form-control" id="msg" placeholder="Enter message">


</footer>

<script>
    //Make the DIV element draggagle:
    dragElement(document.getElementById(("chat")));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

</script>
