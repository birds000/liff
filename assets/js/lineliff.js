// ไม่ได้ใช้
async function shareMsg() {
    await liff.shareTargetPicker([
        {
            type: "text",
            text: "This message was sent by ShareTargetPicker"
        }
    ])
}

// ไม่ได้ใช้
function logOut() {
    liff.logout()
    window.location.reload()
}

// ไม่ได้ใช้
function closed() {
    liff.closeWindow()
}

// ไม่ได้ใช้
async function scanCode() {
    const result = await liff.scanCode()
    document.getElementById("scanCode").append(result.value)
}

// ไม่ได้ใช้
function openWindow() {
    liff.openWindow({
        url: "https://line.me",
        external: true
    })
}

// ไม่ได้ใช้
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

// ยังไม่ได้ใช้
function createUniversalLink() {
    const link1 = liff.permanentLink.createUrl()
    document.getElementById("universalLink1").append(link1)

    liff.permanentLink.setExtraQueryParam('param=9')
    const link2 = liff.permanentLink.createUrl()
    document.getElementById("universalLink2").append(link2)
}

// ยังไม่ได้ใช้
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

// ข้อมูลการติดต่อ
function getContext() {
    document.getElementById("type").append(liff.getContext().type)
    document.getElementById("viewType").append(liff.getContext().viewType)
    document.getElementById("utouId").append(liff.getContext().utouId)
    document.getElementById("roomId").append(liff.getContext().roomId)
    document.getElementById("groupId").append(liff.getContext().groupId)
}

// ข้อมูล profile
async function getUserProfile() {
    const profile = await liff.getProfile()
    document.getElementById("pictureUrl").src = profile.pictureUrl
    document.getElementById("userId").append(profile.userId)
    document.getElementById("statusMessage").append(profile.statusMessage)
    document.getElementById("displayName").append(profile.displayName)
    // document.getElementById("decodedIDToken").append(liff.getDecodedIDToken().email)
    document.getElementById("idToken").append(liff.getIDToken())
}

async function main() {
    liff.ready.then(() => {
        document.getElementById("isLoggedIn").append(liff.isLoggedIn())
        if (liff.isLoggedIn()) {
            // createUniversalLink()
            // getEnvironment()
            getUserProfile()
            getContext()
            getFriendship()
            
        } else {
            liff.login()
        }
    })
    await liff.init({ liffId: LINELIFF_ID })
}