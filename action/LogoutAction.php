<?php

class LogoutAction implements iAction {

    function execute() {
        $_SESSION["login"] = null;
        header(LogoutAction::INDEX_LOCATION);
        die();
    }

}