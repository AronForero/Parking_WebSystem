from reportlab.pdfgen import canvas


pdf = canvas.Canvas("Factura_Entrada.pdf")
pdf.drawCentredString(100, 80, "Parqueadero")
pdf.save()
