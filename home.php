<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./boot-css.php"  ?>
    <?php include "./boot-js.php"?>
    <title>
        <?php
            if (isset($_SESSION['username'])) {
                echo "Welcome " . $_SESSION['username'];
            }   
        ?>
    </title>
    <style>
        ::-webkit-scrollbar{
            width: 1px;
        }
        ::-webkit-scrollbar-thumb{
            background-color: white;
        }
        /* body{
            background:  #F0F2F5;
        } */
        nav{
            background: white;
        }
        .n-center a{
            color: black !important;
        }
        .n-center a:hover{
            color: blue !important;
        }
        .sidebar li{
            transition: all 0.2s;
            padding: 0.4rem;
            cursor: pointer;
        }
        .sidebar li:hover{
            background-color: grey !important;
        }
        .my-story{
            flex-shrink: 0 !important;
        }
        .my-story img{
            object-fit: cover;
        }
        .story-parent{
            overflow-x: scroll !important;
        }
        .my-story .user-image{
            top: 10px;
            left: 10px;
        }
        .my-story .username{
            bottom: 10px;
            left: 10px;
        }
        .list-icon{
            display: none !important;
        }
        @media(min-width: 985px){
            body{
                overflow: hidden !important;
            }
        } 
        @media(max-width: 960px){
            .n-right{
                display: none !important;
            }
            
        }
        @media (max-width:767px){
            .list-icon{
                display: block !important;
            }
            .sidebar{
                background: lightgray;
                position: fixed !important;
                top: 0px;
                z-index: 111;
                width: 40% !important;
                height: 100vh !important;
                transform: translate(-100%);
                transition: all 0.5s;
            }
        }
        @media(max-width: 670px){
            .n-left{
                display: none !important;
            }
            .n-center{
                justify-content: center !important;
            }
        } 
    </style>
    
</head>
<body>

        <?php
        
            if(isset($_SESSION['post_success'])){

        ?>

        <div style="transition: all 0.6s;" class="flash-message z-3 position-fixed top-0 end-0 px-5 py-2 bg-primary text-white fw-bold">
                <?php  
                    echo $_SESSION['post_success'];
                ?>
        </div>
        <?php
            }
            unset($_SESSION['post_success']);

        ?>




    <?php include "./navbar.php" ?>

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-4">
            <?php  include "./sidebar.php" ?>
        </div>

        <div class="col-xl-5 mx-auto col-lg-6 col-md-7" style="height: 89vh;overflow-y:scroll;">

            <?php include "./stories.php" ?>

            <?php  include "./upload-post.php" ?>

            <?php include "./posts.php" ?>

         </div>

        <div class="col-xl-3 col-lg-3">
            
        </div>            
    </div>








    <script>
    document.addEventListener('click', function (event) {
        const dropdownToggle = document.getElementById('dropdownUserInfo');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        // Check if the click is outside the dropdown toggle or menu
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            if (dropdownMenu.classList.contains('show')) {
                dropdownToggle.click(); // Close the dropdown
            }
        }
    });
</script>

<script>
    const commentInputArray=document.querySelectorAll('#commentInput');
    const sendIcinArray=document.querySelectorAll('#sendIcon');

    commentInputArray.forEach((element , index )=> {
        commentInputArray[index].addEventListener('input', function() {
        // Check if the input has text
        if (commentInputArray[index].value.trim() !== "") {
            sendIcinArray[index].style.color = "blue"; // Change to blue when input has text
        } else {
            sendIcinArray[index].style.color = ""; // Revert to default color when input is empty
        }
    });
    });


    // Add an event listener to check for input changes
    commentInput.addEventListener('input', function() {
        // Check if the input has text
        if (commentInput.value.trim() !== "") {
            sendIcon.style.color = "blue"; // Change to blue when input has text
        } else {
            sendIcon.style.color = ""; // Revert to default color when input is empty
        }
    });
</script>

<script>
        let bi_list =document.querySelector('.bi-list');
        let sidebar =document.querySelector('.sidebar');
        let underlay =document.querySelector('.underlay');
        let image_input =document.querySelector('.image_input');
        let image_preview =document.querySelector('.post-preview');
        let message =document.querySelector('.flash-message');


        let comment_form =document.querySelectorAll('.comment-form');
        comment_form.forEach((item,index)=>{
            item.classList.remove('d-flex');
            item.classList.add('d-none');  
        })

        let comment_btn =document.querySelectorAll('.comment-btn');
        comment_btn.forEach((item,index)=>{
            item.addEventListener('click',()=>{
                comment_form.forEach((item,index)=>{
            item.classList.remove('d-flex');
            item.classList.add('d-none');  
        })
                comment_form[index].classList.add('d-flex');
                comment_form[index].classList.remove('d-none');
            })
        })

        image_preview.style.display = 'none';

        bi_list.addEventListener('click',()=>{
            underlay.style.transform = 'translateY(0)';
            sidebar.style.transform = 'translateX(-0)';
        });
        underlay.addEventListener('click',()=>{
            sidebar.style.transform = 'translate(-110%)';
            underlay.style.transform = 'translateY(-100%)';
        });
        image_input.addEventListener('input',(e)=>{
            const file = e.target.files[0]
            const imageURL =URL.createObjectURL(file)
            image_preview.style.display = 'block';
            image_preview.src = imageURL;
        })

        setTimeout(() => {
            message.style.transform = 'translateX(120%)';
        }, 3000);

</script>



    
</body>
</html>