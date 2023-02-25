/* Script For Task Manager(Main Menu) */
let add_Folder = $('#add_folder');
let name_Folder = $('#name_folder');
let container = $('#Result_ajax');
let add_tasks = $('#Add_tasks');
let name_tasks = $('#name_tasks');
let container_task = $('#Result_ajax_tasks');
add_Folder.on("click",function (){
    $.ajax({
        url : "../../process/AjaxHandler.php" ,
        method : "post" ,
        data : {
            action : 'ADD_FOLDER' ,
            name_Fo : name_Folder.val()
        } ,
        success : function (even){
            if (!isNaN(even)) {
                Swal.fire({
                    icon: 'success',
                    title: 'Folder Added',
                })
                container.append(
                    '<li>'
                    + '<a style="color: #7232b7" href="?Folder_id='
                    + even
                    + '"><i class="fa fa-folder"></i>'
                    + name_Folder.val() + '</a>'
                    + '<a style="color: purple" class="a_delete" href="?Delete_folder='
                    + even
                    + '"><i class="fa fa-trash-o"></i></a></li>'
                );
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must enter more than 2 characters!',
                })
            }
            name_Folder.val('');
        }
    });
});

add_tasks.on("click" , function () {
    $.ajax({
        url: "../../process/AjaxHandler.php",
        method: "post",
        data: {
            action: 'ADD_TASKS',
            name_Ta: name_tasks.val(),
            url : window.location.href
        } ,
        success : function (even) {
            let event_arr = even.split('*');
            let array = window.location.href.split('=');
            if(isNaN(array.slice(-1))) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select a folder',
                })
            }
            else if(event_arr[0].length < 3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'You must enter more than 2 characters!',
                })
            }
            else {
                container_task.append(
                    '<li>'

                    +'<i data-isDone="'
                    + event_arr[3] + '*' + event_arr[1]
                    + '" class="isDone fa fa-square-o"></i>'
                    + '<span>'
                    + event_arr[0]
                    + '</span>'
                    + '<div class="info">'
                    + '<a href="?Delete_tasks=' +
                    + event_arr[1]
                    + '" class="button green" onclick="return confirm(\'Are you sure you want to delete?\')">Delete</a>'
                    + '<span>Created in '
                    + event_arr[2]
                    + '</span>'
                    + '</div>'
                    + '</li>'
                );
                let no_tasks =$('.no_tasks');
                if (no_tasks){
                    no_tasks.css('display','none');
                }
            }
            name_tasks.val('');
            name_tasks.trigger('focus');
        }
    });
});
name_tasks.trigger('focus'); //Load Page and focus in add new Task

$('.isDone').on('click',function (){
    let update_name = $(this);
    let isDone = update_name.attr('data-isDone');
    $.ajax({
        url: "../../process/AjaxHandler.php",
        method: "post",
        data: {
            action: 'UPDATE_TASKS',
            update_Ta: isDone,
        },
        success : function (even) {
            let check = parseInt(even) === 0 ? 'fa-check-square-o' : 'fa-square-o';
            let str = parseInt(isDone.charAt(0)) === 1 ? 0 : 1;
            isDone = isDone.replace(isDone.charAt(0),str.toString());
            update_name.attr('data-isDone', isDone);
            update_name.attr('class','isDone fa '+ check);
            update_name.parent('li').attr('class',parseInt(even) === 0 ? 'checked' : '');
        }
    });
});

/* Script For Auth Page */

let signInBtn = document.getElementById("signIn");
let signUpBtn = document.getElementById("signUp");
let fistForm = document.getElementById("form1");
let secondForm = document.getElementById("form2");
let container_auth = document.querySelector(".container");

signInBtn.addEventListener("click", () => {
    container_auth.classList.remove("right-panel-active");
});

signUpBtn.addEventListener("click", () => {
    container_auth.classList.add("right-panel-active");
});

fistForm.addEventListener("submit", (e) => e.preventDefault());
secondForm.addEventListener("submit", (e) => e.preventDefault());