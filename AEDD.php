<?php

    $add = "'add'";
    $edit = "'edit'";
    $detail = "'detail'";
    $delete = "'delete'";

    echo'<div class="add" id="add">
    <div class="wrap">
        <h2><p>New</p></h2>
        <hr>
        <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
            <p class = "wrap-input"><input type="text" name="sname" id="sname" placeholder="Last Name"></p>
            <p class = "wrap-input"><input type="text" name="fname" id="fname" placeholder="First Name"></p>
            <p class = "wrap-input"><input type="text" name="faculty" id="faculty" placeholder= "Faculty"></p>
            <p class = "wrap-input"><input type="text" name="department" id="department" placeholder="Department"></p>
            <p class = "wrap-input">
                <select name="project" id="">
                    <option value="Project 1">Project 1</option>
                    <option value="Project 2">Project 2</option>
                    <option value="Project 2">Project 3</option>
                </select>
            </p>
            <p class = "wrap-input"><input type="submit" name="add" id="add" value="Submit" onclick="hide('.$add.')"></p>
        </form>
    </div>
</div>
<div class="edit" id="edit">
    <div class="wrap">
        <h2><p>New Student</p></h2>
        <hr>
        <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
            <p class = "wrap-input"><input type="text" name="sname" id="sname" placeholder="Last Name" value='..'></p>
            <p class = "wrap-input"><input type="text" name="fname" id="fname" placeholder="First Name"></p>
            <p class = "wrap-input"><input type="text" name="faculty" id="faculty" placeholder= "Faculty"></p>
            <p class = "wrap-input"><input type="text" name="department" id="department" placeholder="Department"></p>
            <p class = "wrap-input">
                <select name="project" id="">
                    <option value="Project 1">Project 1</option>
                    <option value="Project 2">Project 2</option>
                    <option value="Project 2">Project 3</option>
                </select>
            </p>
            <p class = "wrap-input"><input type="submit" name="edit" id="edit" value="Submit" onclick="hide('.$edit.')"></p>
        </form>
    </div>
</div> 
<div class="detail" id="detail">
    <div class="wrap">
        <h2><p>Detail</p></h2>
        <hr>
        <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
            <p class = "wrap-input">A</p>
            <p class = "wrap-input">B</p>
            <p class = "wrap-input">C</p>
            <p class = "wrap-input">D</p>
            <p class = "wrap-input">E</p>
            <p class = "wrap-input"><input type="submit" name="detail" id="detail" value="Submit" onclick="hide('.$detail.')"></p>
        </form>
    </div>
</div>
<div class="delete" id="delete">
    <div class="wrap">
        <h2><p>Delete</p></h2>
        <hr>
        <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
            <p class = "wrap-input"><input type="submit" name="delete" id="delete" value="Delte" onclick="hide('.$delete.')"></p>
            <p class = "wrap-input"><input type="submit" name="cancel" id="cancel" value="Cancel" onclick="hide('.$delete.')"></p>
        </form>
    </div>
</div>'
?>