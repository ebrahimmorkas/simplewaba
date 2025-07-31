<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickZap</title>
      <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body>
    <div class="flex flex-row h-screen w-screen">
        <div class="w-[20%] bg-amber-900">
            Sidebar
        </div>
        <!-- Remaining screen -->
        <div class="w-[80%] bg-amber-300">
            <!-- Navbar start here -->
            <div class="flex flex-row w-full bg-white p-3 border-4">
                <div class="w-[20%] bg-red-100">
                <b>Dashboard</b> <br>
                <span>Here's what happening</span>
                </div>
                <div class="w-[80%] bg-red-500 flex flex-row justify-end">
                    <div class="bg-blue-500">
                        Search
                    </div>
                    <div class="bg-black-500">
                        Dropdown
                    </div>
                </div>
            </div>
            <!-- Navbar end here -->
            <!-- Main content screen starts here -->
             <div class="flex flex-row w-full mt-2 bg-blue-200 p-4">
                <div class="w-full bg-amber-100 h-full">
                    <!-- Four boxes start here -->
                     <div class="flex flex-row w-full justify-evenly bg-amber-950">
                        <div class="w-1/5 bg-amber-500 h-[100px] rounded-2xl">
                            <div class="w-[100px] h-full">
                                one box
                            </div>
                        </div>
                        <div class="w-1/5 bg-amber-100 h-[100px] rounded-2xl">
                            <div class="h-full w-[100px]">
                                second box
                            </div>
                        </div>
                        <div class="w-1/5 bg-amber-500 h-[100px] rounded-2xl">
                            <div class="h-full w-[100px]">
                                Third box
                            </div>
                        </div>
                        <div class="w-1/5 bg-amber-100 h-[100px] rounded-2xl">
                            <div class="h-full w-[100px]">
                                Fourth box
                            </div>
                        </div>
                     </div>
                     <!-- four boxes ends here-->
                      <div>
                        Table containing information regarding messages.
                      </div>
                </div>
             </div>
             <!-- Main content screen ends here -->
        </div>
        <!-- Remaining screen ends here -->
    </div>
</body>
</html>