<?php
$ch = curl_init();
$param_key = 'key=d9658b9d-4f86-491f-bd67-86af0c547a5c';
curl_setopt($ch, CURLOPT_URL, 'https://www.lbcit.ca/demo/api/?'.$param_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);

?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead>
                <tr>
                    <th>Month</th>
                    <?php
                    foreach ($result['series'] as $location)
                    {
                        $name = $location['name'];
                        echo "<th>$name</th>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php
                for($i = 0;$i<12;$i++)
                {
                    $month = $result['categories'][$i];
                    $data_0 = $result['series'][0]['data'][$i];
                    $data_1 = $result['series'][1]['data'][$i];
                    $data_2 = $result['series'][2]['data'][$i];
                    $data_3 = $result['series'][3]['data'][$i];
                    echo "<tr>";
                    echo "<td>$month</td>";
                    echo "<td>$data_0</td>";
                    echo "<td>$data_1</td>";
                    echo "<td>$data_2</td>";
                    echo "<td>$data_3</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
