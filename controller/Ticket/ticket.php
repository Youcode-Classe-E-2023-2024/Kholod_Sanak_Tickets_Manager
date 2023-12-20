<?php
require_once "../../model/Ticket.php";
require_once "../../model/User.php";
require_once "../../model/Comment.php";
require_once "../../view/inc/sidebar.php";

$ticketModel = new Ticket();
$commentModel = new Comment();

$ticketID = $_GET['id'];

$_SESSION["ticket_id"] = $ticketID;

// Assuming you have a method to retrieve ticket details from the database
$ticketDetails = $ticketModel->getTicketAttributes($ticketID);
//var_dump($ticketDetails);
$userID = $ticketDetails['user_id'];


// Check if the form is submitted to create a new comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_text'])) {
    $commentText = $_POST['comment_text'];

    // Create the comment using the Comment class method
    $commentModel->createComment($ticketID, $userID, $commentText);
}

// Retrieve comments for the ticket
$comments = $commentModel->getCommentsForTicket($ticketID);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="h-screen overflow-hidden flex items-center justify-center">
<main class="flex w-full h-full shadow-lg rounded-3xl ">
    <!--  blank section  -->
    <section class="flex flex-col  md:w-3/12 bg-white rounded-l-3xl">
    </section>

    <!--  Start Right section  -->

    <section class="  w-full  md:w-4/12  px-4 flex flex-col bg-white rounded-r-3xl">

        <section>
            <h1 class="font-bold text-2xl mt-6"><?php echo isset($ticketDetails['title']) ? $ticketDetails['title'] : 'Title not available'; ?></h1>
            <article class="mt-8 text-gray-500 leading-7 tracking-wider">
                <p><?php echo isset($ticketDetails['description']) ? $ticketDetails['description'] : 'Description not available'; ?></p>
                <footer class="mt-12 flex space-x-2">

                    <p><?php echo $ticketDetails['due_date'] ?></p>
                    <!-- Due Date -->
                    <svg xmlns="http://www.w3.org/2000/svg" id="due_date" data-name="due_date" viewBox="0 0 122.88 122.89" class="w-4 h-4 mr-1 text-black-400">
                        <path d="M81.61,4.73C81.61,2.12,84.19,0,87.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM66.11,105.66c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1ZM15.85,68.94c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14-10.1H107c.8,0,.8,10.1,0,10.1H91.25c-.8,0-.8-10.1,0-10.1ZM15.85,87.3c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1ZM41,87.3c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H81.9c.8,0,.8,10.1,0,10.1Zm25.14,0c-.8,0-.8-10.1,0-10.1H107c.8,0,.8,10.1,0,10.1Zm-75.4,18.36c-.8,0-.8-10.1,0-10.1H31.64c.8,0,.8,10.1,0,10.1Zm25.13,0c-.8,0-.8-10.1,0-10.1H56.77c.8,0,.8,10.1,0,10.1ZM29.61,4.73C29.61,2.12,32.19,0,35.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM6.4,43.47H116.47v-22a3,3,0,0,0-.86-2.07,2.92,2.92,0,0,0-2.07-.86H103a3.2,3.2,0,0,1,0-6.4h10.55a9.36,9.36,0,0,1,9.33,9.33v92.09a9.36,9.36,0,0,1-9.33,9.33H9.33A9.36,9.36,0,0,1,0,113.55V21.47a9.36,9.36,0,0,1,9.33-9.33H20.6a3.2,3.2,0,1,1,0,6.4H9.33a3,3,0,0,0-2.07.86,2.92,2.92,0,0,0-.86,2.07v22Zm110.08,6.41H6.4v63.67a3,3,0,0,0,.86,2.07,2.92,2.92,0,0,0,2.07.86H113.55a3,3,0,0,0,2.07-.86,2.92,2.92,0,0,0,.86-2.07V49.88ZM50.43,18.54a3.2,3.2,0,0,1,0-6.4H71.92a3.2,3.2,0,1,1,0,6.4Z" fill="#808080" />
                    </svg>

                </footer>
            </article>
            <ul class="flex space-x-4 mt-12">
                <!--  Status   -->
                <li>
            <span class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
               <span aria-hidden class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
									<span class="relative"><?php echo $ticketDetails['status'] ?></span>
									</span>
                </li>
                <!--  Priority   -->
                <li>
            <span
                class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
            <span aria-hidden
                  class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
            <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-blue-500">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 7h2v6h-2zm0 4h2v2h-2z"/>
            </svg>
            <span class="relative ml-2"><?php echo $ticketDetails['priority'] ?></span>
         </div>
          </span>
                </li>
            </ul>
        </section>
        <form id="commentForm" class="comment-form" method="post" action="">
            <section class="mt-6 border rounded-xl bg-gray-50 mb-3">
                <textarea class="w-full bg-gray-50 p-2 rounded-xl"  name="comment_text" placeholder="Type your comment here..." rows="3"></textarea>
                <div class="flex items-center justify-between p-2">
                    <button class="h-6 w-6 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                    </button>
                    <div class=" submit bg-blue-500 hover:bg-blue-700  text-white font-bold px-4 py-2 rounded">Reply</div>
                </div>
            </section>
        </form>
    </section>
    <!--   End Left section  -->


    <!--  Start Right section  -->

    <section class="flex flex-col pt-3   w-full md:w-5/12 bg-gray-50 h-full overflow-y-scroll">
        <!--  Header Start  -->
        <div class="flex justify-between items-center h-30 border-b-2 mb-8">
            <div class="flex space-x-4 items-center">
                <div class="h-12 w-12 rounded-full overflow-hidden">
                    <img src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="flex flex-col">
                    <h3 class="font-semibold text-lg">Creator</h3>
                    <p class="text-light text-gray-400"><?php echo $ticketDetails['user_id']; ?> </p>
                </div>
            </div>
            <div>
                <ul class="flex text-gray-400 space-x-4">
                    <li class="w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header End  -->
        <!-- Comment section mt-6 border rounded-xl bg-gray-50 mb-3 -->

        <section class="comment-section ">
        </section>
    </section>
    <!--   End Right  section  -->
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#commentForm .submit').click(function(e) {
            e.preventDefault();
            var commentText = $('#commentForm textarea[name="comment_text"]').val();

            if (commentText.trim() !== '') {
                var formData = {comment_text: commentText };
                $.ajax({
                    type: 'POST',
                    url: 'add_comment.php',
                    data: formData,
                    success: function(response) {
                        // Assuming response is a JSON-encoded array of comments
                        var comments = JSON.parse(response);

                        // Clear existing comments
                        $('.comment-section').empty();
                            console.log(comments);
                        // Iterate through comments and update the comment section
                        for (var i = 0; i < comments.length; i++) {
                            var commentHTML = '<div class="single-comment">';
                            commentHTML += '<p>' + comments[i].comment + '</p>';
                            commentHTML += '</div>';

                            $('.comment-section').append(commentHTML);
                        }

                        // Clear the text area after adding comments
                        $('#commentForm textarea[name="comment_text"]').val('');
                    },
                    error: function(error) {
                        console.log(error); // Handle errors
                    }
                });
            }
        });
    });

</script>


</body>
</html>

