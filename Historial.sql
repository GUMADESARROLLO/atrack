--AÑO-MES-DIA
SELECT T0.ANULADA, T0.FECHA_FACTURA, T0.FACTURA, T0.ARTICULO, T1.DESCRIPCION, T0.CANTIDAD
FROM   Softland.umk.FACTURA_LINEA T0 INNER JOIN Softland.umk.ARTICULO T1 ON T1.ARTICULO = T0.ARTICULO 
WHERE T0.FACTURA = '00073859'

SELECT * FROM  [dbo].[ARTIPUNTOS] WHERE articulo =   '15010031' 

DELETE FROM [dbo].[ARTIPUNTOS] WHERE ARTICULO = '15010031'  AND PUNTOS = '20' AND FECHAA = '2016-10-12 10:47:27.440'
UPDATE [dbo].[ARTIPUNTOS] SET PUNTOS = '40', CLASIFICACION = '000006' WHERE ARTICULO = '10225011' AND PUNTOS = '20'  AND FECHAA = '2015-07-07 00:00:00.000'

 
--AÑO-DIA-MES																												AÑO-DIA-MES
UPDATE [dbo].[ARTIPUNTOS] SET FECHAA = '2016-15-04 00:00:00.000' WHERE ARTICULO = '15023013' AND PUNTOS = '0' and FECHAA = '2015-27-06 00:00:00.000'


--UPDATE Softland.umk.FACTURA SET ANULADA = 'S' WHERE FACTURA = '00084120'
--UPDATE Softland.umk.FACTURA_LINEA SET ANULADA = 'S' WHERE FACTURA = '00084120'


--SELECT * FROM Softland.umk.FACTURA WHERE FACTURA = '00074803'
--UPDATE [dbo].[ARTIPUNTOS] SET FECHAA = '2015-16-07 00:00:00.000' WHERE ARTICULO = '10522012' AND PUNTOS = '0'

--UPDATE [dbo].[ARTIPUNTOS] SET FECHAA = '2015-08-07 00:00:00.000' WHERE ARTICULO = '13401073'
--UPDATE [dbo].[ARTIPUNTOS] SET CLASIFICACION = '000011', PUNTOS = '15' WHERE ARTICULO = '10523013' 


--AÑO-DIA-MES
INSERT INTO [dbo].[ARTIPUNTOS] VALUES
('15010031','Amlodipina Besilato 5 mg Tabletas 100/Caja (J. Pengyao)','000005','20','2015-21-10 00:00:00.000'),

('13410042', 'Losartán Potásico 50 mg Tabletas Recubiertas 100/Caja (Vardhman)', '000011', '30', '2015-09-06 00:00:00.000'),
('13410042', 'Losartán Potásico 50 mg Tabletas Recubiertas 100/Caja (Vardhman)', '000011', '0', '2015-14-07 00:00:00.000'),
('13410042', 'Losartán Potásico 50 mg Tabletas Recubiertas 100/Caja (Vardhman)', '000011', '30', '2015-12-11 00:00:00.000'),

('10310012', 'Carvedilol 6.25 mg Tableta 30/Caja (Ramos)', '000005', '20', '2015-01-06 00:00:00.000'),
('10310012', 'Carvedilol 6.25 mg Tableta 30/Caja (Ramos)', '000005', '0', '2015-08-06 00:00:00.000'),
('10310012', 'Carvedilol 6.25 mg Tableta 30/Caja (Ramos)', '000005', '20', '2015-10-06 00:00:00.000'),
('10310012', 'Carvedilol 6.25 mg Tableta 30/Caja (Ramos)', '000005', '0', '2015-07-08 00:00:00.000'),
('10310012', 'Carvedilol 6.25 mg Tableta 30/Caja (Ramos)', '000005', '20', '2015-12-08 00:00:00.000'),

('11423013','VITAMINA C 500MG TABLETAS RECUBIERTAS 100/Caja (Huazhong)','000015','15','2015-30-12 00:00:00.000')

('18813011','Ondansetron 8 mg Tabletas Recubiertas 10/Caja (UNIMARK-India)','000013','100','2016-29-11 00:00:00.000')

('10610012', 'Clopidogrel 75 mg Tableta Recubierta 20/Caja (Austin Pharma)', '000005', '20', '2015-20-06 00:00:00.000'),
('10610012', 'Clopidogrel 75 mg Tableta Recubierta 20/Caja (Austin Pharma)', '000005', '0', '2015-01-07 00:00:00.000'),
('10610012', 'Clopidogrel 75 mg Tableta Recubierta 20/Caja (Austin Pharma)', '000005', '20', '2015-23-10 00:00:00.000'),


('10207022', 'Ketoconazol 200 mg Tableta 20/Caja (Hetero)', '000003', '10', '2015-09-06 00:00:00.000'),
('10207022', 'Ketoconazol 200 mg Tableta 20/Caja (Hetero)', '000003', '0', '2015-22-09 00:00:00.000'),
('10207022', 'Ketoconazol 200 mg Tableta 20/Caja (Hetero)', '000003', '10', '2015-05-10 00:00:00.000'),

('13410043', 'Losartán Potásico 50 mg Tabletas Recubiertas 30/Caja (Vardhman)', '000005', '20', '2015-29-08 00:00:00.000'),
('13410043', 'Losartán Potásico 50 mg Tabletas Recubiertas 30/Caja (Vardhman)', '000003', '10', '2016-16-06 00:00:00.000'),

('10301032', 'Acetaminofén 120 mg/5ml Jarabe 120 ml/Frasco 1/Caja (Ramos)', '000008', '4', '2015-04-06 00:00:00.000'),
('10301032', 'Acetaminofén 120 mg/5ml Jarabe 120 ml/Frasco 1/Caja (Ramos)', '000008', '0', '2015-11-10 00:00:00.000'),
('10301032', 'Acetaminofén 120 mg/5ml Jarabe 120 ml/Frasco 1/Caja (Ramos)', '000008', '4', '2015-13-10 00:00:00.000'),


('15016023', 'Gemfibrozilo 600 mg Tabletas Recubiertas 100/Caja (J. Pengyao)', '000012', '50', '2015-08-07 00:00:00.000'),
('15016023', 'Gemfibrozilo 600 mg Tabletas Recubiertas 100/Caja (J. Pengyao)', '000012', '0', '2015-09-08 00:00:00.000'),
('15016023', 'Gemfibrozilo 600 mg Tabletas Recubiertas 100/Caja (J. Pengyao)', '000012', '50', '2015-04-09 00:00:00.000'),

('13614012', 'Levonorgestrel 0.15 mg/Etinilestradiol 0.03 mg Tab 21/Ciclo 1/Caja (Nanjing)', '000003', '0', '2015-06-05 00:00:00.000'),
('13614012', 'Levonorgestrel 0.15 mg/Etinilestradiol 0.03 mg Tab 21/Ciclo 1/Caja (Nanjing)', '000003', '10', '2015-06-05 02:00:00.000'),
('13614012', 'Levonorgestrel 0.15 mg/Etinilestradiol 0.03 mg Tab 21/Ciclo 1/Caja (Nanjing)', '000003', '10', '2015-09-06 00:00:00.000'),

('10305042', 'Cefixima 400 mg Cápsulas 20/Caja (Ramos)', '000013', '100', '2015-01-06 00:00:00.000'),
('10305042', 'Cefixima 400 mg Cápsulas 20/Caja (Ramos)', '000010', '200', '2015-27-07 00:00:00.000'),
('10305042', 'Cefixima 400 mg Cápsulas 20/Caja (Ramos)', '000013', '100', '2015-06-08 00:00:00.000'),

('15005031', 'Clindamicina 300 mg Cápsulas 100/Caja (J. Pengyao)', '000020', '70', '2015-22-08 00:00:00.000'),
('15005031', 'Clindamicina 300 mg Cápsulas 100/Caja (J. Pengyao)', '000020', '0', '2016-20-09 00:00:00.000'),
('15005031', 'Clindamicina 300 mg Cápsulas 100/Caja (J. Pengyao)', '000020', '70', '2016-07-10 00:00:00.000'),
('15005031', 'Clindamicina 300 mg Cápsulas 100/Caja (J. Pengyao)', '000020', '0', '2016-09-11 00:00:00.000'),


('13401013', 'Acido Acetilsalicilico 100 mg Tab BP 100/Caja  (VARDHMAN)', '000003', '10', '2015-09-06 00:00:00.000'),

('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2015-10-07 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '0', '2015-17-07 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2015-30-11 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '0', '2016-05-09 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2016-22-09 00:00:00.000'),


('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2015-08-07 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '0', '2015-08-07 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2015-18-08 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '0', '2015-26-08 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000011', '30', '2015-17-09 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '0', '2015-22-09 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2015-30-09 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '0', '2015-05-10 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2015-09-10 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '0', '2015-29-10 00:00:00.000'),
('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2015-02-11 00:00:00.000'),
--('13401073', 'Relaxolan (Paracetamol/Metocarbamol) Tableta 30/Caja (Vardhman)', '000015', '15', '2016-14-04 00:00:00.000'),


('13401092', 'PARADICLO (Paracetamol/Diclofenac K) 500mg x 50mg Tabletas 10/Caja (Vardhman)', '000018', '3', '2015-28-09 00:00:00.000'),
('13401092', 'PARADICLO (Paracetamol/Diclofenac K) 500mg x 50mg Tabletas 10/Caja (Vardhman)', '000018', '0', '2015-28-10 00:00:00.000'),
('13401092', 'PARADICLO (Paracetamol/Diclofenac K) 500mg x 50mg Tabletas 10/Caja (Vardhman)', '000018', '3', '2015-10-11 00:00:00.000'),

('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2015-10-07 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '0', '2015-11-07 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2015-05-11 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '0', '2016-09-05 00:00:00.000'),


('10305012', 'Aziram (Azitromicina) 500 mg Cápsulas 3/Caja (Ramos)', '000003', '10', '2015-15-06 00:00:00.000'),

('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000006', '40', '2015-01-06 00:00:00.000'),
('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000005', '0', '2015-10-07 00:00:00.000'),
('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000006', '40', '2015-16-07 00:00:00.000'),
('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000007', '60', '2015-07-07 00:00:00.000'),
('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000006', '40', '2015-08-07 00:00:00.000'),
('10225011', 'Tadalafil 20 mg Tabletas Recubiertas 4/Caja (Hetero)', '000005', '20', '2015-07-09 00:00:00.000'),


('10506032', 'Gabapentina 300 mg Tableta 30/Caja (Intermed)', '000011', '30', '2015-10-06 00:00:00.000'),
('10506032', 'Gabapentina 300 mg Tableta 30/Caja (Intermed)', '000011', '0', '2015-26-06 00:00:00.000'),
('10506032', 'Gabapentina 300 mg Tableta 30/Caja (Intermed)', '000011', '30', '2015-02-09 00:00:00.000'),
('10506032', 'Gabapentina 300 mg Tableta 30/Caja (Intermed)', '000011', '0', '2015-11-09 00:00:00.000'),
('10506032', 'Gabapentina 300 mg Tableta 30/Caja (Intermed)', '000011', '30', '2015-06-10 00:00:00.000'),


('10505012', 'Amox/Ac. Clavulánico 250 mg/62.5 mg/5ml PPSO 60 ml/Frasco 1/Caja (Intermed)', '000004', '14', '2015-04-06 00:00:00.000'),
('10505012', 'Amox/Ac. Clavulánico 250 mg/62.5 mg/5ml PPSO 60 ml/Frasco 1/Caja (Intermed)', '000004', '0', '2015-18-06 00:00:00.000'),
('10505012', 'Amox/Ac. Clavulánico 250 mg/62.5 mg/5ml PPSO 60 ml/Frasco 1/Caja (Intermed)', '000004', '14', '2015-03-09 00:00:00.000'),
('10505012', 'Amox/Ac. Clavulánico 250 mg/62.5 mg/5ml PPSO 60 ml/Frasco 1/Caja (Intermed)', '000004', '0', '2015-07-10 00:00:00.000'),
('10505012', 'Amox/Ac. Clavulánico 250 mg/62.5 mg/5ml PPSO 60 ml/Frasco 1/Caja (Intermed)', '000004', '14', '2015-13-10 00:00:00.000'),

('10523023', 'Calcio 600 mg Tabletas 100/Caja (Intermed)', '000011', '30', '2015-28-07 00:00:00.000'),
('10523023', 'Calcio 600 mg Tabletas 100/Caja (Intermed)', '000005', '20', '2015-19-08 00:00:00.000'),
('10523023', 'Calcio 600 mg Tabletas 100/Caja (Intermed)', '000011', '30', '2015-18-09 00:00:00.000'),

('13400101', 'Metocarbamol 500 mg Tab USP 50/Caja (VARDHMAN)', '000011', '30', '2015-20-08 00:00:00.000'),

('15101011', 'Diclofenac Potásico 1% Sol. Spray Tópico Frasco 1/Caja (Lunan)', '000003', '10', '2015-17-08 00:00:00.000'),
('15101011', 'Diclofenac Potásico 1% Sol. Spray Tópico Frasco 1/Caja (Lunan)', '000003', '0', '2015-19-08 00:00:00.000'),
('15101011', 'Diclofenac Potásico 1% Sol. Spray Tópico Frasco 1/Caja (Lunan)', '000003', '10', '2015-18-10 00:00:00.000'),

('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '30', '2015-01-06 00:00:00.000'),
('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '0', '2015-19-06 00:00:00.000'),
('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '30', '2016-07-04 00:00:00.000'),

('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '30', '2015-01-06 00:00:00.000'),
('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '0', '2015-23-06 00:00:00.000'),
('15016011', 'Simvastatina 10 mg Tabletas Recubiertas 10/Caja (J. Pengyao)', '000011', '30', '2016-07-04 00:00:00.000'),


('10206022', 'Sertralina 50 mg Tableta Recubierta 30/Caja (Hetero)', '000005', '20', '2015-02-06 00:00:00.000'),
('10206022', 'Sertralina 50 mg Tableta Recubierta 30/Caja (Hetero)', '000005', '0', '2015-07-07 00:00:00.000'),
('10206022', 'Sertralina 50 mg Tableta Recubierta 30/Caja (Hetero)', '000005', '20', '2015-07-08 00:00:00.000'),


('18817011', 'Risperidona 1 mg Tabletas 30/Caja (UNIMARK-India)', '000019', '25', '2015-07-06 00:00:00.000'),
('18817011', 'Risperidona 1 mg Tabletas 30/Caja (UNIMARK-India)', '000019', '0', '2016-14-04 00:00:00.000'),

('10522012', 'Nitrofurantoina 100 mg Tableta 100/Caja (Intermed)', '000005', '20', '2015-09-06 00:00:00.000'),
('10522012', 'Nitrofurantoina 100 mg Tableta 100/Caja (Intermed)', '000005', '0', '2015-26-06 00:00:00.000'),
('10522012', 'Nitrofurantoina 100 mg Tableta 100/Caja (Intermed)', '000005', '20', '2015-03-09 00:00:00.000'),

('10606011', 'Paroxetina 20 mg Tabletas Recubiertas 30/Caja (Austin Pharma)', '000011', '30', '2015-17-06 00:00:00.000'),
('10606011', 'Paroxetina 20 mg Tabletas Recubiertas 30/Caja (Austin Pharma)', '000011', '0', '2015-03-07 00:00:00.000'),
('10606011', 'Paroxetina 20 mg Tabletas Recubiertas 30/Caja (Austin Pharma)', '000011', '30', '2015-30-10 00:00:00.000'),


('15004011', 'Clorfeniramina 4 mg Tabletas 100/Caja (J. Pengyao)', '000016', '7', '2016-10-06 00:00:00.000'),



('10304072', 'Loratadina 5 mg/5 ml Jarabe 60 ml/Frasco 1/Caja (Ramos)', '000002', '6', '2015-07-07 00:00:00.000'),

('15010073', 'Irbesartan 300 mg Tabletas 30/Caja (J. Pengyao)', '000003', '10', '2015-16-06 00:00:00.000'),
('15010073', 'Irbesartan 300 mg Tabletas 30/Caja (J. Pengyao)', '000003', '0', '2015-16-06 00:00:00.000'),
('15010073', 'Irbesartan 300 mg Tabletas 30/Caja (J. Pengyao)', '000003', '10', '2015-02-09 00:00:00.000'),

('15010083', 'Valsartán 320 mg Tabletas 30/Caja (J. Pengyao)', '000005', '30', '2015-30-10 00:00:00.000'),
('15010083', 'Valsartán 320 mg Tabletas 30/Caja (J. Pengyao)', '000005', '0', '2015-13-08 00:00:00.000'),
('15010083', 'Valsartán 320 mg Tabletas 30/Caja (J. Pengyao)', '000005', '30', '2016-17-02 00:00:00.000'),

('15208011', 'Metronidazol 500 mg/100 ml Solución para Infusión IV Frasco Unidad (Shijiazhuang)', '000005', '20', '2015-23-10 00:00:00.000'),

('10207033', 'Terbinafina 250 mg Tableta 28/Caja (Hetero)', '000007', '30', '2015--06 00:00:00.000'),

('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2015-10-07 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '0', '2015-07-08 00:00:00.000'),
('10505022', 'Amoxicilina/Ac. Clavulanico 875 mg/125 mg Tab Recub.14/Caja (Intermed)', '000004', '14', '2016-08-04 00:00:00.000'),

('15010063', 'Valsartán 160 mg Tabletas 30/Caja (J. Pengyao)', '000005', '20', '2015-30-10 00:00:00.000'),


('13401093', 'Paradiclo (Paracetamol/Diclofenac K 500 mg/50 mg) Tab100/Caja (Vardhman)', '000005', '20', '2015-01-06 00:00:00.000'),
('13401093', 'Paradiclo (Paracetamol/Diclofenac K 500 mg/50 mg) Tab100/Caja (Vardhman)', '000005', '0', '2015-07-08 00:00:00.000'),
('13401093', 'Paradiclo (Paracetamol/Diclofenac K 500 mg/50 mg) Tab100/Caja (Vardhman)', '000005', '20', '2015-13-08 00:00:00.000'),

('15012011', 'Glimepirida 2 mg Tabletas 30/Caja (J. Pengyao)', '000003', '10', '2015-07-10 00:00:00.000'),
('15012011', 'Glimepirida 2 mg Tabletas 30/Caja (J. Pengyao)', '000003', '10', '2016-21-01 00:00:00.000'),

('10523013', 'Calcio 600 mg + Colecalciferol 200 UI Tabletas 100/Caja (Intermed)', '000011', '30', '2015-26-06 00:00:00.000'),
('10523013', 'Calcio 600 mg + Colecalciferol 200 UI Tabletas 100/Caja (Intermed)', '000006', '40', '2016-30-03 00:00:00.000'),

('15010021', 'Irbesartan 150 mg Tabletas 30/Caja (J. Pengyao)', '000011', '10', '2015-01-07 00:00:00.000'),
('15010021', 'Irbesartan 150 mg Tabletas 30/Caja (J. Pengyao)', '000011', '0', '2015-17-07 00:00:00.000'),
('15010021', 'Irbesartan 150 mg Tabletas 30/Caja (J. Pengyao)', '000011', '10', '2015-18-08 00:00:00.000'),



SELECT * FROM [dbo].[vtVS2_Clientes] WHERE CLIENTE = '00711'

SELECT * FROM [dbo].[vtVS2_Facturas_CL] WHERE CLIENTE = '00711'

