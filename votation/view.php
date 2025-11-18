<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Vote for your Candidates | Voting System</title>
    <style>
        .text1 {
            padding-left: 15px;
            padding-top: 15px;
            padding-bottom: 0px;
        }
        .rounded-5 {
            border-radius: 5px;
        }
        .p-5 {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card bg-base-100 w-half">
            <div class="flex flex-col">
                <a href="../index.php"><- Logout</a>
                <h3 class="">Voting Paper</h3>
                <hr>
                <span class="text1">Vote for your candidate. Remember to be patient.</span>
                <form action="" class="pt-10 pb-10">
                    <div class="border rounded-5 p-5 mb-6">
                        <label>President</label>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                            </select>
                        </div>
                    </div>
                    <div class="border rounded-5 p-5 mb-6">
                        <label>Vice-president</label>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                            </select>
                        </div>
                    </div>
                    <div class="border rounded-5 p-5 mb-6">
                        <label>Senator</label>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                                <option value="3">Boom Boom Marcos</option>
                                <option value="4">Freakseid Skywalker</option>
                                <option value="5">Boom Boom Marcos</option>
                                <option value="6">Freakseid Skywalker</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                                <option value="3">Boom Boom Marcos</option>
                                <option value="4">Freakseid Skywalker</option>
                                <option value="5">Boom Boom Marcos</option>
                                <option value="6">Freakseid Skywalker</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                                <option value="3">Boom Boom Marcos</option>
                                <option value="4">Freakseid Skywalker</option>
                                <option value="5">Boom Boom Marcos</option>
                                <option value="6">Freakseid Skywalker</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="candID" id="candID" class="form-control">
                                <option value="1">Boom Boom Marcos</option>
                                <option value="2">Freakseid Skywalker</option>
                                <option value="3">Boom Boom Marcos</option>
                                <option value="4">Freakseid Skywalker</option>
                                <option value="5">Boom Boom Marcos</option>
                                <option value="6">Freakseid Skywalker</option>
                            </select>
                        </div>
                    </div>
                    
                    <input type="text" class="display-none" name="voted" id="voted" value="false">
                    <button class="btn float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>