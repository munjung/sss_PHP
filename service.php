<?php
   // Service class
   // These classes content DAO instance to access Database
   // These clasee use DAO instance's methods such as insert(), delete() and etc.

   // include DAO
   require_once 'dao.php';

   // User service
   class UserService {
      private $dao;

      public function __construct(){
         $this->dao = new UserDao(); // create DAO for User
      }

      // join method
      public function join($u) {
         $this->dao->insert($u); // insert user info to DB
      }

      // login method
      public function login($id, $pw) {
         $u = $this->dao->select($id);

         if($u==null){
            return 1;

         } else { // password check
            if($u->getPw()==$pw) {
               session_start(); // session start
               $_SESSION['id']=$id;
               setcookie('id', $_SESSION['id'], time()+3600, '/');
               return 3;
            } else {
               return 2;
            }
         }
      }

      public function logout() {
         if(session_status()!=PHP_SESSION_ACTIVE){
            session_start();
         }

         session_unset();
         session_cache_expire(60);
         session_destroy();
         setcookie('id', '', 0, '/');
      }

      public function out(){
         if(session_status()!=PHP_SESSION_ACTIVE){
            session_start();
         }

         if(isset($_SESSION['id'])){
            $this->dao->delete($_SESSION['id']);
            $this->logout();
         }
      }   

      public function editInfo($u) {
         $this->dao->update($u);
      }

      public function getUser($id) {
         return $this->dao->select($id);
      }
   }

   class ProductService {
      private $dao;

      // Product Lists
      private $productList = array();
      private $topList = array();
      private $bottomList = array();
      private $dressList = array();

      // Detail Lists
      private $topDetailList = array();
      private $dressDetailList = array();
      private $bottomDetailList = array();

      public function __construct() {
         $this->dao = new ProductDao();
      }

      // get each product instance from DB and add to the arrayList
      // finally, return the array List to main.php or all.php to display
      public function getProductList() {
         $this->productList = $this->dao->selectAll();

         return $this->productList;
      }

      public function getProduct($pid) {
         return $this->dao->select($pid);
      }

      public function getTopList() {
         $this->topList = $this->dao->selectAllTop();

         return $this->topList;
      }

      public function getBottomList() {
         $this->bottomList = $this->dao->selectAllBottom();

         return $this->bottomList;
      }   

      public function getDressList() {
         $this->dressList = $this->dao->selectAllDress();

         return $this->dressList;
      }            

      public function getTopDetailList($pid, $pname, $price) {
         $this->topDetailList = $this->dao->selectTopDetailAll($pid, $pname, $price);

         return $this->topDetailList;
      }

      public function getDressDetailList($pid, $pname, $price) {
         $this->dressDetailList = $this->dao->selectDressDetailAll($pid, $pname, $price);

         return $this->dressDetailList;
      }

      public function getBottomDetailList($pid, $pname, $price) {
         $this->bottomDetailList = $this->dao->selectBottomDetailAll($pid, $pname, $price);

         return $this->bottomDetailList;
      }

   }
?>