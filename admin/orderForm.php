<?php

require('../fpdf/fpdf.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/bh1x1.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/1605befbcb.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@5.0.2/dist/tesseract.min.js"></script>
    <title>Add order</title>
    
</head>
<body>
    <header class="header">
        <div class="headLeftContainer">
            <img src="images/bh.png" alt="logo" class="dashboardLogo">
        </div>
        <div class="headRightContainer">
            <div class="notifContainer">
                <i class="fa-regular fa-bell fa-md"></i>
                <p class="notifCount">3</p>
            </div>
            <i class="fa-solid fa-gear fa-md"></i>
            <img src="images/bh1x1.png" alt="" class="accountProfile">
        </div>
    </header>

    <div class="sideNav">
        <div class="dashboardBtn"> 
            <i class="fa-solid fa-house"></i>
            <p>Dashboard</p>
        </div>

        <div class="ordersBtn">
            <i class="fa-solid fa-caret-right"></i>
            <p>Orders</p>
        </div>
        <div class="ordersActionContainer">
            <div>
                <i class="fa-solid fa-receipt"></i>
                <p>Current</p>
            </div>
            <div>
                <i class="fa-solid fa-check"></i>
                <p>Done</p>
            </div>
        </div>
       
        <div class="calendarBtn"> 
            <i class="fa-solid fa-calendar-days"></i>
            <p>Calendar</p>
        </div>

        <div class="inventoryBtn"> 
            <i class="fa-solid fa-box"></i>
            <p>Inventory</p>
        </div>

        <div class="reportsBtn"> 
            <i class="fa-solid fa-chart-simple"></i>
            <p>Reports</p>
        </div>
    </div>

    <div class="orderFormContainer">
        <h2 style="text-align: center;">Order Form</h2>

        <form class="orderForm" id="orderForm" action="fpdf_order_export.php" method="POST" target="_blank" enctype="multipart/form-data">
        <!-- ORDER #1 -->
            <div class="orderOne" id="order1">
                <h4>Order #1</h4>
                
                <input class="uploadOrder" type="file" id="imageInput1" accept="image/*">
                
                <div class="inputContainer">
                    <div class="orderInput">
                        <label>Name</label>
                        <input type="text" id="name1" name="name1" placeholder="Full name" required>
                    </div>

                    <div class="orderInput">
                        <label>Contact Number</label>
                        <input type="text" id="contact1" name="contact1" placeholder="Contact number" required>
                    </div>
                </div>

                <div class="orderInput">
                    <label>Address</label>
                    <textarea name="address1" id="address1" rows="3" placeholder="Address" required></textarea>
                </div>

                <div class="inputContainer">
                    <div class="orderInput">
                        <label>Order</label>
                        <input type="text" id="orderText1" name="orderText1" placeholder="Order" required>
                    </div>

                   <div class="orderInput">
                        <label>Date & Time</label>
                        <input type="text" id="datetime1" name="datetime1" placeholder="Date and time" required>
                   </div>
                </div>

                <div class="orderInput">
                    <label>Other Details (Size / Dedication)</label>
                    <textarea id="other1" name="other1" rows="3" placeholder="Size and dedication" required></textarea>
                </div>

                <div class="orderInput">
                    <label>Reference</label>
                    <input type="file" name="cake1" accept="image/*">
                </div>

            </div>

            <hr>
                <!-- ORDER #2 -->
            <div class="orderTwo" id="order1">
                <h4>Order #2</h4>
                
                <input class="uploadOrder" type="file" id="imageInput2" accept="image/*">
                
                <div class="inputContainer">
                    <div class="orderInput">
                        <label>Name</label>
                        <input type="text" id="name2" name="name2" placeholder="Full name" required>
                    </div>

                    <div class="orderInput">
                        <label>Contact Number</label>
                        <input type="text" id="contact2" name="contact2" placeholder="Contact number" required>
                    </div>
                </div>

                <div class="orderInput">
                    <label>Address</label>
                    <textarea id="address2" name="address2" rows="3" placeholder="Address" required></textarea>
                </div>

                <div class="inputContainer">
                    <div class="orderInput">
                        <label>Order</label>
                        <input type="text" id="orderText2" name="orderText2" placeholder="Order" required>
                    </div>

                   <div class="orderInput">
                        <label>Date & Time</label>
                        <input type="text" id="datetime2" name="datetime2" placeholder="Date and time" required>
                   </div>
                </div>

                <div class="orderInput">
                    <label>Other Details (Size / Dedication)</label>
                    <textarea id="other2" name="other2" rows="3" placeholder="Size and dedication" required></textarea>
                </div>

                <div class="orderInput">
                    <label>Reference</label>
                    <input type="file" name="cake2" accept="image/*">
                </div>
            </div>

            <button type="submit" class="printBtn" id="printBtn">🖨️ Print PDF</button>
        </form>
    </div>

  <script>
    // Define field label mapping
    const fieldMap = {
      "name": "name",
      "address": "address",
      "contact": "contact",
      "contact no": "contact",
      "contact number": "contact",
      "order": "orderText",
      "date": "datetime",
      "date & time": "datetime",
      "time": "datetime",
      "size": "other",
      "dedication": "other",
      "other": "other",
      "other details": "other"
    };

    // Normalize label
    function normalizeLabel(s) {
      if (!s) return "";
      let t = s.replace(/\(.*?\)/g, "").replace(/[^\w\s]/g, " ");
      return t.replace(/\s+/g, " ").trim().toLowerCase();
    }

    function findField(label) {
      const norm = normalizeLabel(label);
      for (const key in fieldMap) {
        if (norm.includes(key)) return fieldMap[key];
      }
      return null;
    }

    async function processOCR(file, prefix) {
      const { data: { text } } = await Tesseract.recognize(file, 'eng', { logger: m => console.log(m) });
      const lines = text.split('\n').map(l => l.trim()).filter(Boolean);
      const result = {};
      let current = null;

      for (const line of lines) {
        const colonIndex = line.indexOf(':');
        if (colonIndex !== -1) {
          const label = line.substring(0, colonIndex);
          const value = line.substring(colonIndex + 1).trim();
          const field = findField(label);
          if (field) {
            result[field] = (result[field] || "") + " " + value;
            current = field;
          } else current = null;
        } else if (current) {
          result[current] += " " + line;
        }
      }

      // Fill form
      for (const key in fieldMap) {
        const id = fieldMap[key];
        const el = document.getElementById(id + prefix);
        if (el) el.value = result[id] ? result[id].trim() : "";
      }
    }

    document.getElementById('imageInput1').addEventListener('change', e => {
      if (e.target.files[0]) processOCR(e.target.files[0], "1");
    });
    document.getElementById('imageInput2').addEventListener('change', e => {
      if (e.target.files[0]) processOCR(e.target.files[0], "2");
    });
  </script>

        
</body>
</html>