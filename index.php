<?php
if(true)
{
    $aOrder_Info = array();

    $aOrder_Info['order_id']        = 'SDKTEST'.time() ;
    $aOrder_Info['order_amount']    = 5274;    
    $aOrder_Info['Items']           = array('Name' => "義吸沛礦泉水", 'Price' => (int)"5274", 'Currency' => "元", 'Quantity' => (int) "1") ;

    //載入SDK(路徑可依系統規劃自行調整)
    include('ECPay.Payment.Integration.php');
    try {
        
        $obj = new ECPay_AllInOne();

        //服務參數
        $obj->ServiceURL  = 'https://payment-stage.ecpay.com.tw/SP/CreateTrade';    //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                    //測試用Hashkey，請自行帶入ECPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                    //測試用HashIV，請自行帶入ECPay提供的HashIV
        $obj->MerchantID  = '2000132';                                              //測試用MerchantID，請自行帶入ECPay提供的MerchantID
        $obj->EncryptType = '1';                                                    //CheckMacValue加密類型，請固定填入1，使用SHA256加密


        //基本參數(請依系統規劃自行調整)
        $obj->Send['ReturnURL']         = $_SERVER['HTTP_HOST'].'/payment_receive.php' ;            //付款完成通知回傳的網址
        $obj->Send['MerchantTradeNo']   = $aOrder_Info['order_id'];                                 //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                                      //交易時間
        $obj->Send['TotalAmount']       = $aOrder_Info['order_amount'];                             //交易金額
        $obj->Send['TradeDesc']         = "Whosoever drinketh of this water shall thirst again" ;   //交易描述
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::ALL ;                                //付款方式:全功能
        $obj->Send['NeedExtraPaidInfo']= 'Y' ;

        // //訂單的商品資料
        array_push($obj->Send['Items'], $aOrder_Info['Items']);

        // ATM 延伸參數
        $obj->SendExtend['ExpireDate'] = 1 ;                 //繳費期限 (預設3天，最長60天，最短1天)
        $obj->SendExtend['PaymentInfoURL'] = "";             //伺服器端回傳付款相關資訊。
      
        // CVS超商代碼延伸參數(可依系統需求選擇是否代入)
        $obj->SendExtend['Desc_1']            = 'Desc_1';       //交易描述1 會顯示在超商繳費平台的螢幕上。預設空值
        $obj->SendExtend['Desc_2']            = 'Desc_2';       //交易描述2 會顯示在超商繳費平台的螢幕上。預設空值
        $obj->SendExtend['Desc_3']            = '';             //交易描述3 會顯示在超商繳費平台的螢幕上。預設空值
        $obj->SendExtend['Desc_4']            = '';             //交易描述4 會顯示在超商繳費平台的螢幕上。預設空值
        $obj->SendExtend['PaymentInfoURL']    = '';             //預設空值
        $obj->SendExtend['ClientRedirectURL'] = '';             //預設空值
        $obj->SendExtend['StoreExpireDate']   = '2';            //預設空值 (以分鐘為單位)

        //產生訂單(auto submit至ECPay)
        $aSdk_Return = $obj->CreateTrade();

    } catch (Exception $e) {
        echo $e->getMessage() ;
    } 
}

?>

<!DOCTYPE html>
<html lang="tw">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>ECPay站內付全方位金流範例程式</title>
    </head>
    <body>
        <script src="https://payment-stage.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js"
            data-MerchantID="<?php echo $obj->MerchantID;?>" 
            data-SPToken="<?php echo $aSdk_Return['SPToken']?>"
            data-PaymentType="CREDIT"
            data-PaymentName="信用卡"
            data-CustomerBtn="0" >
        </script>

        <script src="https://payment-stage.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js" 
            data-MerchantID="<?php echo $obj->MerchantID;?>" 
            data-SPToken="<?php echo $aSdk_Return['SPToken']?>"
            data-PaymentType="ATM" 
            data-PaymentName="ATM">
        </script>

        <script src="https://payment-stage.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js" 
            data-MerchantID="<?php echo $obj->MerchantID;?>" 
            data-SPToken="<?php echo $aSdk_Return['SPToken']?>"
            data-PaymentType="CVS" 
            data-PaymentName="CVS">
        </script>

    </body>
</html>
