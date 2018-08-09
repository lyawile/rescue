<h1>Upload Registration File</h1>
<div class="content">
    <?= $this->Flash->render() ?>
    <div class="upload-frm">
        <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
            <?php echo $this->Form->control('file', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Upload File'), ['type'=>'submit', 'class' => 'form-control btn btn-info']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
     <!-- Table -->
    <table class="table">
        <tr>
            <th width="5%"># <?= $cmx ?></th>
            <th width="20%">File</th>
            <th width="12%">Upload Date</th>
        </tr>
        <?php if($filesRowNum > 0):$count = 0; foreach($files as $file): $count++;?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><embed src="<?= $file->path.$file->name ?>" width="220px" height="150px"></td>
            <td><?php echo $file->created; ?></td>
        </tr>
        <?php endforeach; else:?>
        <tr><td colspan="3">No file(s) found......</td>
        <?php endif; ?>
    </table>
</div>