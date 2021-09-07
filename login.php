<!doctype html>
<html lang="en">
    
    <?php include('./src/header.php') ?>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card mt-5" style="max-width: 500px;">
                <div class="card-header">
                    <h4 class="card-title">
                        <!-- <img src="./assets/images/logo/logo-SLOT365.png" alt="" width="50"> -->
                        เข้าสู่ระบบ
                    </h4>
                </div>
                <p id="isLoggedIn"><b>isLoggedIn:</b> </p>
                <div class="card-body">
                    <form class="form form-vertical" method="post" id="form-register">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <img width="100" id="pictureUrl" alt="user" class="rounded-circle">
                                        <h3 style="margin-top: 20px" id="displayName"></h3>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputNumBank">username</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="" id="inputUsername"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputTel">password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder=""
                                                id="inputPassword" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <input type="text" id="userId">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">เข้าสู่ระบบ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('./src/footer.php') ?>

    <script>
        function createUniversalLink() {
            const link1 = liff.permanentLink.createUrl()
            document.getElementById("universalLink1").append(link1)

            liff.permanentLink.setExtraQueryParam('param=9')
            const link2 = liff.permanentLink.createUrl()
            document.getElementById("universalLink2").append(link2)
        }

        async function shareMsg() {
            await liff.shareTargetPicker([
                {
                    type: "text",
                    text: "This message was sent by ShareTargetPicker"
                }
            ])
        }

        function logOut() {
            liff.logout()
            window.location.reload()
        }

        function closed() {
            liff.closeWindow()
        }

        async function scanCode() {
            const result = await liff.scanCode()
            document.getElementById("scanCode").append(result.value)
        }

        function openWindow() {
            liff.openWindow({
                url: "https://line.me",
                external: true
            })
        }

        // บังคับเป็นเพื่อนกับบอท
        async function getFriendship() {
            const friend = await liff.getFriendship()
            document.getElementById("friendship").append(friend.friendFlag)
            if (!friend.friendFlag) {
                if (confirm("คุณยังไม่ได้เพิ่ม Bot เป็นเพื่อน จะเพิ่มเลยไหม?")) {
                    window.location = "https://line.me/R/ti/p/@178yfyoa"
                }
            }
        }

        async function sendMsg() {
            if (liff.getContext().type !== "none") {
                await liff.sendMessages([
                    {
                        "type": "sticker",
                        "stickerId": 1,
                        "packageId": 1
                    }
                ])
                alert("Message sent")
            }
        }

        function getContext() {
            document.getElementById("type").append(liff.getContext().type)
            document.getElementById("viewType").append(liff.getContext().viewType)
            document.getElementById("utouId").append(liff.getContext().utouId)
            document.getElementById("roomId").append(liff.getContext().roomId)
            document.getElementById("groupId").append(liff.getContext().groupId)
        }

        async function getUserProfile() {
            const profile = await liff.getProfile()
            document.getElementById("pictureUrl").src = profile.pictureUrl
            document.getElementById("userId").append(profile.userId)
            // document.getElementById("statusMessage").append(profile.statusMessage)
            document.getElementById("displayName").append(profile.displayName)
            // document.getElementById("decodedIDToken").append(liff.getDecodedIDToken().email)
            // document.getElementById("idToken").append(liff.getIDToken())
        }

        function getEnvironment() {
            document.getElementById("os").append(liff.getOS())
            document.getElementById("language").append(liff.getLanguage())
            document.getElementById("version").append(liff.getVersion())
            document.getElementById("accessToken").append(liff.getAccessToken())
            document.getElementById("isInClient").append(liff.isInClient())
            if (liff.isInClient()) {
                document.getElementById("btnLogOut").style.display = "none"
            } else {
                document.getElementById("btnMsg").style.display = "none"
                document.getElementById("btnScanCode").style.display = "none"
                document.getElementById("btnClose").style.display = "none"
            }
        }

        async function main() {
            liff.ready.then(() => {
                document.getElementById("isLoggedIn").append(liff.isLoggedIn())
                if (liff.isLoggedIn()) {
                    // getEnvironment()
                    getUserProfile()
                    // getContext()
                    // getFriendship()
                    // createUniversalLink()
                } else {
                    liff.login({ redirectUri: "http://localhost/new-register/login.php" })
                }
            })
            await liff.init({ liffId: LINELIFF_ID })
            
        }

        main()
    </script>
    
</body>

</html>