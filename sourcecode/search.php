<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    * {
        box-sizing: border-box;

    }

    .example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        border-radius: 20px 0 0 20px;
        float: left;
        width: 20%;
        background-color: white;
        transition: width 1s ease-in-out;
    }

    .example button {
        float: left;
        width: 20%;
        padding: 12px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-radius: 0 20px 20px 0;
        border-left: none;
        cursor: pointer;
    }

    .example button:hover {
        background: #0b7dda;

    }

    .example::after {
        content: "";
        clear: both;
        display: table;
    }

    .example input[type=text]:focus {
        width: 80%;
    }

</style>
<script>
    function results() {
        var str = document.getElementById('search').value;
        var x = new XMLHttpRequest;
        x.open("get", "joblist.php?str=" + str);
        x.send();
        x.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById('result').innerHTML = this.responseText;
            }
        }
    }

</script>
<div class="example">
    <input type="text" placeholder="Search Job.." id="search">
    <button class="btn btn-primary" onclick="results()"><i class="fa fa-search"></i></button>
</div>
<div class="result" id="result"></div>
