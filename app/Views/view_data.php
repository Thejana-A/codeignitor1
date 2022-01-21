<!DOCTYPE html>
<html lang="en">
<head>
    <title>Uploaded data</title>
</head>
<body>
    <h2>Images & titles</h2>
    <ul>
    <?php 
        foreach ($result->getResult() as $row) :
        $absolute_path = "home/thejana/Documents/assignments/is1109/ci/project-root/writable/uploads/".$row->userfile;
    ?>                                
    <li>
        <img src="<?php echo base_url($absolute_path); ?>" width="50px" />
        <?php echo $row->image_title; ?>
    </li>   
    
    <?php endforeach; ?>
    </ul>
</body>
</html>