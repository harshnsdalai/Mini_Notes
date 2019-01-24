<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
        function getdata() {
            $.get("getdata.php");
            return false;
        }
        
        $(".toggleforms").click(function(){
            $(".signup").toggle()
            $(".login").toggle()
        })
        $(".plus").click(function(){
            var d = new Date();
            var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
            var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

            
            $(".text").html($(".text").html()+'<div class=\"form-group alert alert-success\" style="padding: 10px;margin:20px;margin-left: 40px;margin-right:40px;"><label for=\"exampleFormControlTextarea1\">Date:  '+strDate+'</br> Time:  '+time+'</label><textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"2\">'+$("textarea").val()+'</textarea></div>')
            
            alert ($(".text").html());
        })
        $('.text').bind("DOMSubtreeModified",function(){
            alert (getdata())
            /*$.ajax(){
                method: "POST";
                url :"addtodata.php";
                data :{content : getdata()}
            }
  //alert('changed');*/
});
        
    
    
    
    </script>
</body>
</html>


