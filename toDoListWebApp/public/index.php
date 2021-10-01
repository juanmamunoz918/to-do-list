<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Web App</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <header class="header">
        <div class="content-header">
            <div class="nav">
                <a href="#">
                    <h1>To-Do List</h1>
                </a>
            </div> 
        </div>
    </header>


    <main class="container">
        <div class="path">
            <h4><span id="folder" class="show-folders">Folders </span><span id="list-path" class="hidden show-list">>List</span></h4>
        </div>
        <div class="content">
            <div id="folders-container" class="folder visible">
                <ul id="list-folders"class="folders">   
                </ul>
                <form class="add-button">
                    <input type="text" id="folderName" placeholder="New Folder">
                    <button  id="folder-add" type="submit">Add</button>
                </form>
            </div>
            <div id="items-container" class="to-do_items hidden">
                <p>To-Do items</p>
                <ul id="list-activities" class="activities">
                </ul>
                <form class="add-button">
                    <input id="activityName" type="text" placeholder="New Task">
                    <button id="activity-add" type="submit">Add</button>
                </form>
            </div>
            <div id="editing-activities" class="hidden edit">
                
            </div>
        </div>
    </main>
    <div id="login-screen" class="login">

    </div>
    <footer class="footer section">
        <p class="copyright">Juan Martín Muñoz <?php echo date("Y") ?> &copy;</p>
    </footer>
    <script src="build/js/jQuery-3.6.0.js"></script>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>