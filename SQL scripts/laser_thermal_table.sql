CREATE TABLE Laser (
lID int unsigned not null auto_increment UNIQUE,
cuID int unsigned not null,
location varchar(255),
adminPC varchar(255),
PO varchar(255),
purchaseDate date,
warranty date, model varchar(255),
serialNumber varchar(255),
subscription boolean,
active boolean,
locking boolean,
orientation varchar(255),
pitch varchar(255),
LPP varchar(255),
net_IP varchar(255),
net_cfp varchar(255),
net_lpt varchar(255),
net_emul varchar(255),
par_IP varchar(255),
par_cfp varchar(255),
par_lpt varchar(255),
par_emul varchar(255),
printServerSerial varchar(255),
closedAccount varchar(255),
null_val boolean,
printPortON varchar(255),
lp_ck boolean,
lp_port varchar(255),
lp_tray varchar(255),
inq_ck boolean,
inq_port varchar(255),
inq_tray varchar(255),
report_ck boolean,
report_port varchar(255),
report_tray varchar(255),
notes LONGTEXT,
netapps_ck boolean,
netapps_port varchar(255),
netapps_tray varchar(255),
check_ck boolean,
check_port varchar(255),
check_tray varchar(255),
check_filename varchar(255),
cd_ck boolean,
cd_port varchar(255),
cd_tray varchar(255),
cd_filename varchar(255),
recpt_ck boolean,
recpt_port varchar(255),
recpt_tray varchar(255),
recpt_filename varchar(255),
other1_ck boolean,
other1_formtype varchar(255),
other1_port varchar(255),
other1_tray varchar(255),
other1_filename varchar(255),
other2_ck boolean,
other2_port varchar(255),
other2_formtype varchar(255),
other2_tray varchar(255),
other2_filename varchar(255),
LPC_ck boolean,
LPC_port varchar(255),
LPC_tray varchar(255),
LPC_filename varchar(255),
MA_ck boolean,
MA_port varchar(255),
MA_tray varchar(255),
MA_filename varchar(255),
NSF_ck boolean,
NSF_port varchar(255),
NSF_tray varchar(255),
NSF_filename varchar(255),
CP_ck boolean,
CP_port varchar(255),
CP_tray varchar(255),
CP_filename varchar(255),
NO_ck boolean,
NO_port varchar(255),
NO_tray varchar(255),
NO_filename varchar(255),
PD_ck boolean,
PD_port varchar(255),
PD_tray varchar(255),
PD_filename varchar(255),
CAN_ck boolean,
CAN_port varchar(255),
CAN_tray varchar(255),
CAN_filename varchar(255),
other3_ck boolean,
other3_formtype varchar(255),
other3_port varchar(255),
other3_tray varchar(255),
other3_filename varchar(255),
other4_ck boolean,
other4_formtype varchar(255),
other4_port varchar(255),
other4_tray varchar(255),
other4_filename varchar(255),
other5_ck boolean,
other5_formtype varchar(255),
other5_port varchar(255),
other5_tray varchar(255),
other5_filename varchar(255),
constraint laser_ibfk_1 foreign key (cuID) references Credit_Union(cuID) on delete cascade,
primary key(lID)
);

CREATE TABLE Thermal (
tID int unsigned not null auto_increment,
cuID int unsigned not null,
serialNumber varchar(255),
moduleT varchar(255),
purchaseDate DATE,
INDEX pn_CU_index(cuID),
constraint thermal_ibfk_1 foreign key (cuID) references Credit_Union(cuID) on delete cascade,
primary key(tID)
);