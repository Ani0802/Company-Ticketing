<?php
include('./../includes/header.php');
?>

<section class="raiseTicket">
  <div class="container">
    <h2>Create a new Ticket</h2>
    <form action="redirect.php" method="post" class="ticketForm" enctype="multipart/form-data">
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>

      <label for="priority">Priority:</label>
      <select id="priority" name="priority">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
      </select>

      <label for="category">Category:</label>
      <select id="category" name="category">
        <option value="technical">Technical Issue</option>
        <option value="billing">Billing</option>
        <option value="feedback">Feedback</option>
      </select>

      <label for="attachments">Attachments:</label>
      <input type="file" id="attachments" name="attachments" multiple>

      <input type="submit" name="create_ticket_btn" value="Submit">
    </form>
  </div>
</section>


<?php
include('./../includes/footer.php');
?>