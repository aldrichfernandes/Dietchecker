<?php if($this->session->flashdata('registered')) : ?>
   <?php echo '<p class=" alert alert-dismissable alert-success">' .$this->session->flashdata('registered') . '</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('login_success')) : ?>
   <?php echo '<p class=" alert alert-dismissable alert-success">' .$this->session->flashdata('login_success') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('noaccess')) : ?>
   <?php echo '<p class=" alert alert-dismissable alert-danger">' .$this->session->flashdata('noaccess') . '</p>'; ?>
<?php endif; ?>

<h1> Welcome to Dietchecker!</h1>
<p> DIETCHECKER IS A SIMPLE APPLICATION WHICH ALSO ITS USER TO KEEP TRACK OF THEIR AND DAY TO DAY TASK. THIS APPLICATION ALLOWS OLDER ADULTS TO TAKE CHARGE OF THEIR DIET PLANS AND REMINDERS. </p>
<br />
<br />

<h3>My Latest Lists</h3>
<table class="table table-striped" width="100%" cellspacing="10" cellpadding="10">
    <tr>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($lists)) : ?>
    <?php foreach($lists as $list) : ?>
    <tr>
        <td><?php echo $list->list_name; ?></td>
        <td><?php echo $list->create_date; ?></td>
        <td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View List</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

<h3>Latest Tasks</h3>
<table class="table table-striped" width="80%" cellspacing="8" cellpadding="8">
    <tr>
        <th>Task Name</th>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($tasks)) : ?>
<?php foreach($tasks as $task) : ?>
     <tr>
        <td> <?php echo $task->task_name; ?></td>
         <td><?php echo $task->list_name; ?></td>
        <td><?php echo $task->create_date; ?></td>
        <td><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->id; ?>">View Task</a></td>

    </tr>
<?php endforeach; ?>
     <?php endif;?>
</table>
