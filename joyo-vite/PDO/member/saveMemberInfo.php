<?php
    session_start();
    include '../connect/conn.php';

    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    $IMG_URL = $data['IMG_URL'];
    $MEMBER_NAME = $data['MEMBER_NAME'];
    $BIRTHDAY = $data['BIRTHDAY'];
    $PHONE = $data['PHONE'];
    $ADDR_CITY = $data['ADDR_CITY'];
    $ADDR_DIST = $data['ADDR_DIST'];
    $ADDR_DETAIL = $data['ADDR_DETAIL'];
    $member_id = $_SESSION['member_id'];

    $sql = "update MEMBER
                set IMG_URL = ?,
                    MEMBER_NAME = ?,
                    BIRTHDAY = ?,
                    PHONE = ?,
                    ADDR_CITY = ?,
                    ADDR_DIST = ?,
                    ADDR_DETAIL = ?
            where MEMBER_ID = '$member_id' ";

    $statement = $pdo -> prepare($sql);
    $statement -> bindValue( 1, $IMG_URL );
    $statement -> bindValue( 2, $MEMBER_NAME );
    $statement -> bindValue( 3, $BIRTHDAY );
    $statement -> bindValue( 4, $PHONE );
    $statement -> bindValue( 5, $ADDR_CITY );
    $statement -> bindValue( 6, $ADDR_DIST );
    $statement -> bindValue( 7, $ADDR_DETAIL );

    $statement -> execute();
    echo 'true';

?>