
var invoice;
var requestDate;
var clientId;
var requestTarget;
function payment() {
    requestTarget = "/checkout/v1/payment";
    invoice = 'INV'+Math.floor(Math.random() * (100000 - 200000)) + 100000;
    clientId = "BRN-0286-1699886030538";
    requestDate = new Date().toISOString().slice(0, 19) + "Z";
    var environmentUrl = 'https://sandbox.doku.com';

    var body = prepareBody();
    var headers = createHeader(body);

    var requestOptions = {
        method: 'POST',
        headers: headers,
        body: body,
    };

    var jsondata;
   fetch(environmentUrl + requestTarget, requestOptions)
        .then((response) => {
            console.log(response);
            console.log(response);
            response.json().then((data) => {

                if(response.status !== 200){

                    return catchFailed(JSON.stringify(data.error.message));
                }
                jsondata = data.response.payment.url;
                loadJokulCheckout(jsondata);
                console.log(jsondata)
            }).catch(error => {
                catchFailed("")
            })
        });
}

function createHeader(body) {
    var headers = new Headers();

    headers.append("Content-Type", "application/json");
    headers.append("Cookie", "mage-messages=%5B%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid+Form+Key.+Please+refresh+the+page.%22%7D%2C%7B%22type%22%3A%22error%22%2C%22text%22%3A%22Invalid+Form+Key.+Please+refresh+the+page.%22%7D%5D; private_content_version=cafb69bfd073f907e5cc36f1d50c6bfe; language=en-gb; currency=USD; 12e90ac5d2a98d102b62f925ddf35976=d77af848c45d55fb14b93c688e9c5a0099999999");
    headers.append("Signature", 'HMACSHA256='+createSignature(body));
    headers.append("Request-Id", invoice);
    headers.append("Client-Id", clientId);
    headers.append("Request-Timestamp", requestDate);
    return headers;
}

function prepareBody() {
    var order_amount = document.getElementById("order_amount").value;
    var order_invoice_number = invoice;
    var session_id = makeSession(32);
    var today = new Date();
    var request_date_time = today.getFullYear() + '0' + (today.getMonth() + 1) + '' + today.getDate() + today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
    var order_callback_url = document.getElementById("order_callback_url").value;
    var item_name = 'DOKU Basic T-Shirt';
    var item_price = document.getElementById("order_amount").value;
    var item_quantity = 1;
    var customer_name = document.getElementById("customer_name").value;
    var customer_email = document.getElementById("customer_email").value;
    var customer_phone = document.getElementById("customer_phone").value;
    var customer_address = document.getElementById("customer_address").value;

    var body = "{\n" +
        "\t\"customer\": {\n" +
        "        \"country\": \"ID\",\n" +
        "        \"email\": \"" + customer_email + "\",\n" +
        "        \"name\": \"" + customer_name + "\",\n" +
        "        \"phone\": \"" + customer_phone + "\"\n" +
        "    },\n" +
        "\t\"order\": {\n" +
        "        \"amount\": " + order_amount  + ",\n" +
        "        \"callback_url\": \"" + order_callback_url + "\",\n" +
        "        \"currency\": \"IDR\",\n" +
        "        \"invoice_number\": \"" + order_invoice_number + "\",\n" +
        "        \"line_items\": [\n" +
        "            {\n" +
        "                \"name\": \"" + item_name + "\",\n" +
        "                \"price\": " + order_amount + ",\n" +
        "                \"quantity\": " + item_quantity + "\n" +
        "            }\n" +
        "        ],\n" +
        "        \"session_id\": \"" + session_id + "\"\n" +
        "    },\n" +
        "\t\"payment\": {\n" +
        "        \"payment_due_date\": 60\n" +
        "    }\n" +
        "}";

    return body;
}

function consumeDigest(digest) {
    var processedDigest =
        "Client-Id:" + clientId + "\n"
        + "Request-Id:" + invoice + "\n"
        + "Request-Timestamp:" + requestDate + "\n"
        + "Request-Target:" + requestTarget + "\n"
        + "Digest:" + digest;
    return processedDigest;
}
function makeSession(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
function createSignature(body) {
    var digest = CryptoJS.enc.Base64.stringify(CryptoJS.SHA256(body));
    var rawSignature = consumeDigest(digest);
    var key = "SK-R9XuAX6DJNacoJsGeBEG";
    var signature = CryptoJS.enc.Base64.stringify(CryptoJS.HmacSHA256(rawSignature, key));
    return signature;
}

function catchFailed(error) {
    swal({
        title: "Order Failed",
        text: error,
        icon: "error",
        button: "Close",
    });
}
