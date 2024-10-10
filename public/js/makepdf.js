// Define the fonts using URLs to the local files
const baseurl = window.location.origin;
console.log(baseurl);

pdfMake.fonts = {
    THSarabunNew: {
        normal:baseurl+ "/js/THSarabunNew.ttf",
        bold:baseurl+ "/js/THSarabunNew Bold.ttf",
        italics:baseurl+ "/js/THSarabunNew Italic.ttf",
        bolditalics:baseurl+ "/js/THSarabunNew BoldItalic.ttf",
    },
};

// ตัวอย่าง datatable pdf

new DataTable("#pdf_table", {
    /*caption: "<?php echo $showCaption; ?>",*/
    layout: {
        topStart: {
            buttons: [
                "copy",
                {
                    extend: "excel",
                    // messageTop: "<?php echo $showCaption; ?>",
                    filename: "reportAgroup",
                },
                {
                    extend: "pdfHtml5",
                    text: "PDF",
                    orientation: "landscape", //landscape,portrait
                    pageSize: "A4",
                    // title: "<?php echo $showCaption; ?>",
                    exportOptions: {
                        columns: ":visible", // Export only visible columns
                    },
                    customize: function (doc) {
                        // Set page margins (left,top,right,bottom) to 20 units
                        doc.pageMargins = [20, 20, 15, 15];

                        // Set the font to a font that supports Thai
                        doc.defaultStyle = {
                            font: "THSarabunNew",
                            fontSize: 12,
                        };

                        // Add borders to the table
                        doc.content[1].layout = {
                            hLineWidth: function (i, node) {
                                return 0.5;
                            },
                            vLineWidth: function (i, node) {
                                return 0.5;
                            },
                            hLineColor: function (i, node) {
                                return "#aaa";
                            },
                            vLineColor: function (i, node) {
                                return "#aaa";
                            },
                        };

                        // var rows = doc.content[1].table.body;

                        // for (var i = 0; i < rows.length; i++) {
                        //     var row = rows[i];
                        //     for (var j = 0; j < row.length; j++) {
                        //         if (j == 0 || j == 7) {
                        //             // Center align the first column
                        //             row[j].alignment = "center";
                        //         }
                        //         if (
                        //             j == 2 ||
                        //             j == 3 ||
                        //             j == 4 ||
                        //             j == 5 ||
                        //             j == 6
                        //         ) {
                        //             row[j].alignment = "right";
                        //         }
                        //     }
                        //     if (
                        //         row.length > 0 &&
                        //         row[1].text.startsWith("รายงานการเบิก-จ่าย")
                        //     ) {
                        //         // กำหนดสีพื้นหลังหรือสไตล์อื่น ๆ สำหรับแถวที่มีคลาส table-info
                        //         var colSpanText = row[1].text; // Get text from the cell that needs colspan
                        //         row[0] = {
                        //             text: colSpanText,
                        //             colSpan: 8, // Set colspan value
                        //             alignment: "left",
                        //             fillColor: "#fbd45e",
                        //         };
                        //     }
                        //     if (
                        //         row.length > 0 &&
                        //         row[1].text.startsWith("ยอดรวม กลุ่ม")
                        //     ) {
                        //         // กำหนดสีพื้นหลังหรือสไตล์อื่น ๆ สำหรับแถวที่มีคลาส table-info
                        //         var colSpanText = row[1].text; // Get text from the cell that needs colspan
                        //         row[0] = {
                        //             text: colSpanText,
                        //             colSpan: 2, // Set colspan value
                        //             alignment: "left",
                        //         };
                        //         row.forEach((cell) => {
                        //             cell.fillColor = "#fbd45e"; // สีพื้นหลังของแถวที่มีคลาส table-info
                        //             /**
                        //              * fbd45e เหลือง
                        //              * cff4fc ฟ้า
                        //              */
                        //         });
                        //     }
                        //     if (
                        //         row.length > 0 &&
                        //         row[0].text == "" &&
                        //         row[1].text == ""
                        //     ) {
                        //         // กำหนดสีพื้นหลังหรือสไตล์อื่น ๆ สำหรับแถวที่มีคลาส table-info
                        //         row[0] = {
                        //             text: "",
                        //             colSpan: 8, // Set colspan value
                        //             fillColor: "#ffffff",
                        //             border: [false, false, false, false],
                        //         };
                        //     }
                        //     if (
                        //         row.length > 0 &&
                        //         row[1].text == "ยอดรวมทั้งสิ้น"
                        //     ) {
                        //         // กำหนดสีพื้นหลังหรือสไตล์อื่น ๆ สำหรับแถวที่มีคลาส table-info
                        //         var colSpanText = row[1].text; // Get text from the cell that needs colspan
                        //         row[0] = {
                        //             text: colSpanText,
                        //             colSpan: 2, // Set colspan value
                        //             alignment: "center",
                        //         };

                        //         row.forEach((cell) => {
                        //             cell.fillColor = "#cff4fc"; // สีพื้นหลังของแถวที่มีคลาส table-info
                        //             cell.fontSize = 12; // Larger font size for header
                        //             cell.bold = true; // Bold text for header
                        //             // Set border : left, top, right, bottom
                        //             cell.border = [false, false, false, true]; // Set borders for all sides
                        //             cell.borderColor = [
                        //                 "#000000",
                        //                 "#000000",
                        //                 "#000000",
                        //                 "#000000",
                        //             ];
                        //             // cell.borderStyle = ['solid', 'dotted', 'dashed', 'double'];
                        //             cell.borderStyle = ["", "", "", "double"];
                        //             cell.borderWidth = [0, 0, 0, 5];
                        //         });
                        //     }
                        // }
                        // doc.content[1].table.widths = [
                        //     18, // ลำดับ
                        //     "auto", // โครงการ
                        //     60, // รับจัดสรร
                        //     60, // เบิก-จ่าย
                        //     60, // เบิกจ่ายสะสม
                        //     60, // คงเหลือ
                        //     32, // %เบิกจ่าย
                        //     88, // รหัสผลผลิต
                        // ];
                    },
                },
            ],
        },
    },
    ordering: false,
    paging: false,
});
