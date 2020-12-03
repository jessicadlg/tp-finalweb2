<?php
include_once("helper/IncludeAllDirectory.php");
$dir = new IncludeAllDirectory();
$dir->includeAllFile("helper/");
$dir->includeAllFile("models/");
$dir->includeAllFile("controller/");

include_once "Router.php";

class Configuration
{
    public function getUsuariosModel()
    {
        $database = $this->getDatabase();
        return new UsuariosModel($database);
    }

    private function getDatabase()
    {
        $config = $this->getConfig();
        return new MySqlDatabase($config['host'], $config['user'], $config['password'], $config['database']);
    }

    private function getConfig()
    {
        return parse_ini_file("config/online.ini");
    }

    public function getRouter()
    {
        return new Router($this);
    }

    public function getIndexController()
    {
        return new IndexController($this->getRender());
    }

    public function getLogoutController()
    {
        return new LogoutController($this->getRender());
    }

    public function getProformaController()
    {
        $modelo = $this->getProformaModel();
        return new ProformaController($modelo, $this->getRender(), $this->getPdf(), $this->getGenQR());
    }

    public function getHomeController()
    {
        return new HomeController($this->getRender());
    }

    public function getUsuariosController()
    {
        $modelo = $this->getUsuariosModel();
        return new UsuariosController($modelo, $this->getRender());
    }

    public function getRegistrarController()
    {
        return new RegistrarController($this->getRender());
    }

    public function getTallerModel()
    {
        $database = $this->getDatabase();
        return new TallerModel($database);
    }

    public function getTallerController()
    {
        $modelo = $this->getTallerModel();
        return new TallerController($modelo, $this->getRender());
    }

    private function getRender()
    {
        return new Render();
    }

    private function getPdf()
    {
        return new InformePdf();
    }

    private function getGenQR()
    {
        return new CodigoQR();
    }

    public function getVehiculoModel()
    {
        $database = $this->getDatabase();
        return new VehiculoModel($database);
    }

    public function getVehiculoController()
    {
        $modelo = $this->getVehiculoModel();
        return new VehiculoController($modelo, $this->getRender());
    }

    public function getProformaModel()
    {
        $database = $this->getDatabase();
        return new ProformaModel($database);
    }

    public function getMantenimientoModel()
    {
        $database = $this->getDatabase();
        return new MantenimientoModel($database);
    }

    public function getMantenimientoController()
    {
        $modelo = $this->getMantenimientoModel();
        return new MantenimientoController($modelo, $this->getRender());
    }

    public function getViajeModel()
    {
        $database = $this->getDatabase();
        return new ViajeModel($database);
    }

    public function getViajeController()
    {
        $modelo = $this->getViajeModel();
        return new ViajeController($modelo, $this->getRender());
    }

    public function getClienteController()
    {
        $modelo = $this->getClienteModel();
        return new ClienteController($modelo, $this->getRender());
    }

    public function getClienteModel()
    {
        $database = $this->getDatabase();
        return new ClienteModel($database);
    }

    public function getArrastreController()
    {
        $modelo = $this->getArrastreModel();
        return new ArrastreController($modelo, $this->getRender());
    }

    public function getArrastreModel()
    {
        $database = $this->getDatabase();
        return new ArrastreModel($database);
    }

    public function getServiceController()
    {
        $modelo = $this->getServiceModel();
        return new ServiceController($modelo, $this->getRender());
    }

    public function getServiceModel()
    {
        $database = $this->getDatabase();
        return new ServiceModel($database);
    }

    public function getCelularesController()
    {
        $modelo = $this->getCelularesModel();
        return new CelularesController($modelo, $this->getRender());
    }

    public function getCelularesModel()
    {
        $database = $this->getDatabase();
        return new CelularesModel($database);
    }
}