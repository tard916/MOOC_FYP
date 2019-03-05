//get the id from the the table and send to the trainer personal update form
$(".btnEditPer").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $id = $row.find(".id").text();
    var $wid = $row.find(".weekid").text();
    var $cid = $row.find(".courseid").text(); // Find the text
  window.location.href = "backend/manageCC.php?id=" + $id +"&weekID="+ $wid +"&cid="+ $cid;
});