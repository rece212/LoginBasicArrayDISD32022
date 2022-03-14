<?php
    if ((isset($UserData)==0)&&(isset($_SESSION['Array'])==0))
    {
        $ud = new UserData();
        $ud->setValues();
        $ArrayTest=$ud->getArray();

        $_SESSION['Array']=$ArrayTest;
    }
class UserData
{
    /**
     * @var string[][]
     */
    private static $UserData2;

    function  setValues()
    {
        self::$UserData2 = array(
            array("1f9d9a9efc2f523b2f09629444632b5c","26269474bc6e14f4f9449c36056d92d3","ps. John"),
            array("bbff37631b524c3aadd1b1b25e020e08","61409aa1fd47d4a5332de23cbf59a36f","Pastor John"),
            array("3ee8a343f1c208a4836cff32b5237922","9477c9fc574c967285c7860c78d2c75a","Bishop Paul"),
            array("ac946bf7babe63933f3eba52db544dec","3aa4584e547efba20238772d4af5c03d","Mr Pastor van Zyl"));

    }
    function getArray()
    {
        return self::$UserData2;
    }
}

?>