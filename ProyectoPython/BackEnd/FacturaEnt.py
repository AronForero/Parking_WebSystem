from reportlab.platypus import (BaseDocTemplate, PageTemplate, Frame, Paragraph, NextPageTemplate)
from reportlab.lib.styles import ParagraphStyle
from reportlab.lib.enums import TA_LEFT, TA_CENTER
from reportlab.lib.colors import black
from reportlab.lib.units import cm #Importo la medida Centimetros

def stylesheet():
    styles= {
        'default': ParagraphStyle(
            'default',
            fontName='Helvetica',
            fontSize=10,
            leading=12,
            leftIndent=0,
            rightIndent=0,
            firstLineIndent=0,
            alignment=TA_LEFT,
            spaceBefore=0,
            spaceAfter=0,
            bulletFontName='Times-Roman',
            bulletFontSize=10,
            bulletIndent=0,
            textColor= black,
            backColor=None,
            wordWrap=None,
            borderWidth= 0,
            borderPadding= 0,
            borderColor= None,
            borderRadius= None,
            allowWidows= 1,
            allowOrphans= 0,
            textTransform=None,  # 'uppercase' | 'lowercase' | None
            endDots=None,
            splitLongWords=1,
        ),
    }
    styles['title'] = ParagraphStyle(
        'title',
        parent=styles['default'],
        fontName='Helvetica-Bold',
        fontSize=14,
        leading=22,
        textColor=black,
    )
    styles['jump'] = ParagraphStyle(
        'jump',
        parent=styles['default'],
        leading=38,
    )
    styles['serial'] = ParagraphStyle(
        'serial',
        parent=styles['default'],
        leading=38, #Espacio entre lineas
    )
    return styles

def build_flowables(stylesheet, placa, Hora, Fecha, Cascos):
    return [
            NextPageTemplate('Segunda Columna'), #Seleccionando el PageTemplate
            Paragraph("Parqueadero...", stylesheet['title']),
            Paragraph('Leidy Johana Forero Paez - Nit. ##########-#', stylesheet['default']),
            Paragraph('Cll 42 #11-## - Cel. ##########', stylesheet['jump']),
            Paragraph('Placa:.............'+ placa, stylesheet['default']),
            Paragraph('Hora:..............'+ Hora, stylesheet['default']),
            Paragraph('Fecha:............'+ Fecha, stylesheet['default']),
            Paragraph('Cascos:..........'+ Cascos, stylesheet['default']),
            Paragraph("01", stylesheet['default'])
           ]

def build_pdf(filename, flowables):
    doc = BaseDocTemplate(filename, pagesize=(8*cm,5*cm), leftMargin=0.5*cm, topMargin=2*cm, bottomMargin=0*cm)
    #Se agrega el PageTemplate, tiene como argumento una lista de PageTemplate, el cual tiene un parametro id y otro frames = []
    doc.addPageTemplates([PageTemplate(id="Segunda Columna", frames=[Frame(0.2*cm, -0.4*cm, 6*cm, 5.5*cm, id='1'),Frame(5.8*cm,4*cm,2*cm,0.9*cm, showBoundary=1, id='2')])])
    doc.build(flowables)
#______________________________________________________FUNCIONAMIENTO____________________________________________________
placa = "msn24b"
Hora = "15:30"
Fecha = "19/10/2017"
Cascos = "1"
build_pdf('Factura_Entrada.pdf', build_flowables(stylesheet(), placa, Hora, Fecha, Cascos))
