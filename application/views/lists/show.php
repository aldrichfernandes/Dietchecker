<ul id= "actions">
	<h4>List Actions</h4>
	<li> <a href="<?php echo base_url(); ?>tasks/add/<?php echo $list->id; ?>">Add Task</a></li>
	<li> <a href="<?php echo base_url(); ?>lists/edit/<?php echo $list->id; ?>">Edit The List</a></li>
	<li> <a oneclick="return confirm('Are You Sure?)" href= "<?php echo base_url(); ?>lists/delete/<?php echo $list->id; ?>">Delete The List</a></li>
</ul>
<h1><?php echo $list->list_name; ?></h1>

<?php if($this->session->flashdata('task_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('task_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_created') . '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('task_updated')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_updated') . '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('marked_complete')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_complete') . '</p>'; ?>

<?php endif; ?>
<?php if($this->session->flashdata('marked_new')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_new') . '</p>'; ?>
    
<?php endif; ?>
Creation Date: <strong><?php echo date("n-j-Y",strtotime($list->create_date)); ?></strong>
<br /><br />
<div style="max-width:600px";><?php echo $list->list_body; ?></div>
<br /><br />

<h4> Tasks That Are Active </h4>

<?php if($active_tasks) : ?>
	<ul>
		<?php foreach($active_tasks as $task) : ?>
		<li><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php else : ?>

	<p> There are no Active tasks to be displayed </p>
<?php endif; ?>
<br />


<h4> Tasks That Not Active </h4>

<?php if($inactive_tasks) : ?>
	<ul>
		<?php foreach($inactive_tasks as $task) : ?>
		<li><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php else : ?>

	<p> There are no completed tasks to be displayed </p>
<?php endif; ?>
<br />