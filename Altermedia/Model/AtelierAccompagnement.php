<?php 
$path = $_SERVER['DOCUMENT_ROOT'].'/admin/config/MyPDO.php';
require_once($path);

class AtelierAccompagnement{
	private $id;
	private $titre;
	private $date;
	private $heure;
	private $description;
    private $statut;

	public function __construct($id = null) {

		if (isset($id)) {
				//1 argument récupération dans la DB
				$MyPdo = new MyPDO();
				$sql = "SELECT * FROM atelieraccomp WHERE id = " . $id;
				$rqt = $MyPdo->query($sql);
				$result = $rqt->fetch();

				$this->id = $result['id'];
				//$this->titre = $result['titre'];
                $this->titre = $result['titre'] = "Prochain atelier d'accompagnement de projets"; 
				$this->date = $result['date'];
				$this->heure = $result['heure'];
				$this->description = $result['description'];
                $this->statut = $result['statut'];
		}
	}
	
	public function getId() {
		return $this->id;
	}

	public function getTitre() {
		return $this->titre;
	}

	public function getDate() {
		return $this->date;
	}

	public function getHeure() {
		return $this->heure;
	}

	public function getDescription() {
		return $this->description;
	}
    
    public function getstatut() {
		return $this->statut;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setTitre($titre) {
		$this->titre = $titre;
	}
    
    public function setDate($date) {
		$this->date = $date;
	}
    
    public function setHeure($heure) {
		$this->heure = $heure;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
    
    public function setstatut($statut) {
		$this->statut = $statut;
	}

	public function create() {
		$oMyPdo = new MyPDO();
		$sSql = "INSERT INTO atelieraccomp (titre, date, heure, description, statut) VALUES (?, ?, ?, ?, ?)";
		$oMyPdoStmt = $oMyPdo->prepare($sSql);
		$oMyPdoStmt->bindParam(1, $this->titre);
        $oMyPdoStmt->bindParam(2, $this->date);
        $oMyPdoStmt->bindParam(3, $this->heure);
		$oMyPdoStmt->bindParam(4, $this->description);
		$oMyPdoStmt->bindParam(5, $this->statut);
		return $oMyPdoStmt->execute();
	}

	public function update() {
		$oMyPdo = new MyPDO();
		$sSql = "UPDATE atelieraccomp SET titre=?, date=?, heure=?, description=?, statut=? WHERE id=?";
		$oMyPdoStmt = $oMyPdo->prepare($sSql);
		$oMyPdoStmt->bindParam(1, $this->titre);
		$oMyPdoStmt->bindParam(2, $this->date);
		$oMyPdoStmt->bindParam(3, $this->heure);
		$oMyPdoStmt->bindParam(4, $this->description);
		$oMyPdoStmt->bindParam(5, $this->statut);
		$oMyPdoStmt->bindParam(6, $this->id);
		return $oMyPdoStmt->execute();
	}

	public function delete() {
		$oMyPdo = new MyPDO();
		$sSql = 'DELETE FROM atelieraccomp WHERE id=?';
		$oMyPdoStmt = $oMyPdo->prepare($sSql);
		$oMyPdoStmt->bindParam(1, $this->id);
		return $oMyPdoStmt->execute();
	}

	public static function readAll() {
		$oPdo = new MyPDO();
		$sSql = "SELECT *, 
        TIME_FORMAT(atelieraccomp.heure, '%Hh%i') as heure_fr,
        YEAR(atelieraccomp.date) as date_y,
        MONTH(atelieraccomp.date) as date_m,
        DAY(atelieraccomp.date) as date_d,
        CASE EXTRACT(MONTH FROM atelieraccomp.date)
            WHEN 01 Then 'Janvier'
            WHEN 02 then 'Février'
            WHEN 03 then 'Mars'
            WHEN 04 Then 'Avril'
            WHEN 05 Then 'Mai'
            WHEN 06 Then 'Juin'
            WHEN 07 then 'Juillet'
            WHEN 08 then 'Août'
            WHEN 09 then 'Septembre'
            WHEN 10 then 'Octobre'
            WHEN 11 then 'Novembre'
            WHEN 12 then 'Décembre'
        END AS date_fr
        FROM atelieraccomp";
		$oPdoStmt = $oPdo->query($sSql);
		$aReunionColl = $oPdoStmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);	
		return $aReunionColl;	
	}

	public static function readAllOnline() {
		$oPdo = new MyPDO();
		$sSql = "SELECT *, 
        TIME_FORMAT(atelieraccomp.heure, '%Hh%i') as heure_fr,
        YEAR(atelieraccomp.date) as date_y,
        MONTH(atelieraccomp.date) as date_m,
        DAY(atelieraccomp.date) as date_d,
        CASE EXTRACT(MONTH FROM atelieraccomp.date)
            WHEN 01 Then 'Janvier'
            WHEN 02 then 'Février'
            WHEN 03 then 'Mars'
            WHEN 04 Then 'Avril'
            WHEN 05 Then 'Mai'
            WHEN 06 Then 'Juin'
            WHEN 07 then 'Juillet'
            WHEN 08 then 'Août'
            WHEN 09 then 'Septembre'
            WHEN 10 then 'Octobre'
            WHEN 11 then 'Novembre'
            WHEN 12 then 'Décembre'
        END AS date_fr
		FROM atelieraccomp
		WHERE statut = '1'";
		$oPdoStmt = $oPdo->query($sSql);
		$aReunionColl = $oPdoStmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);	
		return $aReunionColl;	
	}
}

?>