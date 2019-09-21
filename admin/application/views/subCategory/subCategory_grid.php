

<div class="container" style="text-align: right;">
    <button class="btn btn-primary" onclick="openForm(false)">Add New</button>
    <div style="height: 20px;"></div>
</div>
<div class="container">
	<table id="dataTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>SUBCATEGORY NAME</th>
                <th>CATEGORY</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($grid_data){
                $i=0;
                foreach ($grid_data as $data) { 
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['NAME']; ?></td>
                        <td><?php echo $data['CATEGORY']; ?></td>
                        <td><?php echo $data['STATUS']; ?></td>
                        <td>
                            <button class="btn-info" onclick="openForm(true , '<?php echo $data['ID'] ?>')"><i class="fa fa-edit"></i></button>
                            <button class="btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    
            <?php  }
            } ?>
            
        </tbody>
    </table>
</div>
