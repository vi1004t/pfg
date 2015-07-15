var clic = 1;
function divLogin($id){
 if(clic==1){
 document.getElementById($id).style.height = "100%";
 document.getElementById($id).style.display = "block";

 clic = clic + 1;
 } else{
     document.getElementById($id).style.height = "0px";
      document.getElementById($id).style.display = "none";
  clic = 1;
 }
}
