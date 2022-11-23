<?php
    require('fpdf.php');
        $connect = mysqli_connect("localhost", "root", "", "guidance_and_counseling");  

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $Search = $_POST['query']; // from AJAX
            $sql = "SELECT * FROM users WHERE first_name LIKE '%".$Search."%'";  
            $result = mysqli_query($connect, $sql); 
                //DECLARING FOR HTML INNER
            $output = '<table class="table table-striped" border="3">
                        <tr>
                             <td>FirstName</td>
                             <td>LastName</td>
                        </tr>';
                 
            
            while($row= mysqli_fetch_assoc($result)){

                $output.='<tr>';
                $output.='<td>'.$row['first_name'].'</td>';
                $output.='<td>'.$row['last_name'].'</td>';
                
                $font = 'C:\xampp\htdocs\gc_capstone\Guidance_Counselor_UI\Arimo-Bold.TTF';
                $image = imagecreatefromjpeg("certificate.jpg");
                $color = imagecolorallocate($image, 19, 21, 22);
                $name = $row['first_name']." ".$row['last_name'];
                imagettftext($image, 20, 0, 720,730, $color, $font, $name); 
                imagejpeg($image, "insertedCert/Picture.jpg" ); 
                $pdf = new FPDF('L','in',[11.7,8.27]);
                $pdf->AddPage();
                $pdf->Image("insertedCert/Picture.jpg",0,0,11.7,8.27);
                $pdf->Output("insertedCert/Picture.pdf","F");
                imagedestroy($image);
             

             


            }
            $output.='</tr>';
            $output.='</table>';
            echo $output;

        }
?>