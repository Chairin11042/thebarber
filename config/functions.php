<?php 

include 'connect.php';

define('DB_SERVER', $host);
define('DB_USER', $user); // Database Username
define('DB_PASS', $password); // Database Password
define('DB_NAME', $dbname); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            mysqli_query($conn, "SET NAMES UTF8");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }

        public function updatetoken($token,$lid) {
            $result = mysqli_query($this->dbcon, "UPDATE linetoken SET 
            token = '$token'
            WHERE id = '$lid'
            ");
            return $result;
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function registration($fname, $uname, $uemail,$custaddr, $password) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail,tel, password) VALUES('$fname', '$uname', '$uemail','$custaddr', '$password')");
            return $reg;
        }

        public function booking($cid,$services,$services2, $tech, $dates,$enddate2,$enddate,$services_time,$description) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO booking(custid, services,services2, techid,date,thistime, time,services_time,description) VALUES('$cid', '$services','$services2', '$tech','$dates','$enddate2', '$enddate','$services_time', '$description')");
            return $reg;
        }
		  public function add11($nameH,$priceH,$timeH) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO service(s_name, s_price,s_time) VALUES('$nameH', '$priceH','$timeH')");
            return $reg;
        }
		 public function up($nameH1,$priceH1,$timeH1,$HairUp) {
            $reg = mysqli_query($this->dbcon, "UPDATE service SET s_name = '$nameH1', s_price= '$priceH1', s_time= '$timeH1'
WHERE s_name = '$HairUp';");
            return $reg;
        }

        public function insertpdata($uid,$ucredit,$uprice) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO productdata(product_id, qty, price) VALUES('$uid', '$ucredit', '$uprice')");
            return $reg;
        }

        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname ,role_id ,useremail , tel FROM tblusers WHERE username = '$uname' AND password = '$password'");
            return $signinquery;
        }

        public function fetchbooking() {
            $signinquery = mysqli_query($this->dbcon, "SELECT thistime, disapprove,status_id,booking.id as bid ,services_time,fullname,s_name,s_time,techid,date,time,services2,description FROM booking,service,tblusers WHERE tblusers.id=booking.custid and tblusers.id=booking.custid and booking.services=service.id order by booking.id desc");
            return $signinquery;
        }
		 public function fetchbooking1() {
            $signinquery = mysqli_query($this->dbcon, "SELECT * FROM service");
            return $signinquery;
        }
		 public function fetchbooking22($HairUp) {
            $signinquery = mysqli_query($this->dbcon, "SELECT * FROM service WHERE s_name='$HairUp'");
            return $signinquery;
        }


        public function fetchbooking_user($uid) {
            $signinquery = mysqli_query($this->dbcon, "SELECT disapprove,status_id,booking.id as bid ,services_time,fullname,s_name,s_time,techid,date,time,services2,description FROM booking,service,tblusers WHERE tblusers.id=booking.custid and tblusers.id=booking.custid and booking.services=service.id and custid=$uid order by booking.id desc");
            return $signinquery;
        }

         public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function fetchdatacategory() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM categories");
            return $result;
        }

        public function deletecategory($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM categories WHERE catId = '$userid'");
            return $deleterecord;
        }

        public function update($fname, $uname, $email, $password, $date, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                fullname = '$fname',
                username = '$uname',
                useremail = '$email',
                password = '$password',
                regdate = '$date'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function updaterole($role_id,$uid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
            role_id = '$role_id'
            WHERE id = '$uid'
            ");
            return $result;
        }

        public function disapprove($id,$disapprove) {
            $result = mysqli_query($this->dbcon, "UPDATE booking SET 
            disapprove = '$disapprove'
            WHERE id = '$id'
            ");
            return $result;
        }
        public function disapprovestatus($id) {
            $result = mysqli_query($this->dbcon, "UPDATE booking SET 
            status_id = 2
            WHERE id = '$id'
            ");
            return $result;
        }

        public function updateqty($ucredit,$uid) {
            $result = mysqli_query($this->dbcon, "UPDATE products SET 
            qty = qty+'$ucredit'
            WHERE id = '$uid'
            ");
            return $result;
        }

        public function fetchdata_product($catId) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM products where catId=$catId and status_id = 0");
            return $result;
        }

        public function fetchdata_allproduct() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM products where  status_id = 0");
            return $result;
        }

        public function fetchdata_order_detail($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM orders,status_cash WHERE status_cash.status_id=orders.status_id and cust_id = '$userid'");
            return $result;
        }

        public function fetchdata_order_detail_admin() {
            $result = mysqli_query($this->dbcon, "SELECT orders.id,order_date,fullname,status_name,pic,orders.status_id ,report_id FROM orders,tblusers,status_cash,cashout where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id and orders.id=cashout.order_id");
            return $result;
        }

        public function fetchorder_detail($order_id) {
            $result = mysqli_query($this->dbcon, "SELECT fullname,product_name,order_detail_price,order_detail_quantity ,custaddr,order_id ,useremail FROM order_details,products,tblusers,orders,status_cash 
            WHERE status_cash.status_id=orders.status_id and order_details.order_id=orders.id and tblusers.id=orders.cust_id and products.id=order_details.product_id and order_id = '$order_id'");
            return $result;
        }

        public function uploadPhoto($fields = array()) {

            $photo = $this->_db->insert('userPhotos', array('user_id' => $this->data()->id));
            if(!$photo) {
                throw new Exception('There was a problem creating your account.');
            }
        }

        public function fetchdata_category() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM categories");
            return $result;
        }


        public function fetchdata_ctproduct($catId) {
            $result = mysqli_query($this->dbcon, "SELECT count(id) as cpid FROM `products` WHERE catId=$catId and status_id=0");
            return $result;
        }
}

?>