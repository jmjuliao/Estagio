<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Argentina/Buenos_Aires');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => '127.0.0.1',
  'port' => '3306',
  'username' => 'root',
  'database' => 'estagio'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageGroups()
{
    $result = array('Default');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Aluno', 'short_caption' => 'Aluno', 'filename' => 'aluno.php', 'name' => 'aluno', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Atividade', 'short_caption' => 'Atividade', 'filename' => 'atividade.php', 'name' => 'atividade', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Curso', 'short_caption' => 'Curso', 'filename' => 'curso.php', 'name' => 'curso', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Empresa', 'short_caption' => 'Empresa', 'filename' => 'empresa.php', 'name' => 'empresa', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Estagio', 'short_caption' => 'Estagio', 'filename' => 'estagio.php', 'name' => 'estagio', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Estagio Atividade', 'short_caption' => 'Estagio Atividade', 'filename' => 'estagio_atividade.php', 'name' => 'estagio_atividade', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Professor', 'short_caption' => 'Professor', 'filename' => 'professor.php', 'name' => 'professor', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Relatorio Periodico', 'short_caption' => 'Relatorio Periodico', 'filename' => 'relatorio_periodico.php', 'name' => 'relatorio_periodico', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Usuario', 'short_caption' => 'Usuario', 'filename' => 'usuario.php', 'name' => 'usuario', 'group_name' => 'Default', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '';
}

function GetPagesFooter()
{
    return
        ''; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($part, $mode, &$result, &$params, Page $page = null)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}



?>