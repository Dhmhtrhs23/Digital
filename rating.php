<?php
function readFileContents($filePath) {
    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file contents
        $fileContents = file_get_contents($filePath);
        
        // Return the file contents
        return $fileContents;
    } else {
        // Return an error message if the file doesn't exist
        return "File not found: $filePath";
    }
}

?>
<script>
function rate(num)
{
    let params = new URLSearchParams(document.location.search);
    window.location.replace("api.php?data=rate|" + String(num) + "|" + params.get("data"));
}
</script>
<h2>Rating</h2>

<?php
    $data = $_GET['data'];

    $content = readFileContents(getcwd()."/rating/".$data);

    $contentS = explode("|",$content);

    $c = 0;
    $sum=0;
    $mesos =0;
    foreach ($contentS as &$value) {
        if ($value == "") {continue;}
        try {
           $sum = $sum + intval($value);
           $c = $c + 1;
           $mesos = $sum/$c;
           $before =0;
        } catch (Exception $e) {}
    }
            foreach (range(0, $mesos) as $number) {
              echo '<button style="float:left;" onclick="rate('.strval($number).');" ">⭐</button>';
              $before = $number;
           }
           if ((5-$mesos)>=1){
           foreach (range(0, 5-$mesos) as $number) {
               echo '<button style="float:left;" onclick="rate('.strval($before+$number).')">★</button>';
           }}
?>
