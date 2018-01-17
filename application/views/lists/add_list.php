<h1>Add a List</h1>
<p>Please fill out the form below to add a new task list</p>

<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('lists/add'); ?>

<p>
<?php echo form_label('List Name:'); ?>
<?php
$data = array(
              'name'        => 'list_name',
              'value'       => set_value('list_name')
            );
?>
<?php echo form_input($data); ?>
</p>

<p>
<?php echo form_label('List Body:'); ?>
<?php
$data = array(
              'name'        => 'list_body',
              'value'       => set_value('list_body')
            );
?>
<?php echo form_textarea($data); ?>
</p>


<?php $data = array("value" => "Add List",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>