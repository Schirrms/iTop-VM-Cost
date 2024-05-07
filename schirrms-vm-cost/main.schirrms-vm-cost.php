<?php

/* Complementary classes to automate the cost value display
 *
 */

class VirtualMachineCost 
{
  public function GetOrgCost($org_id)
  {
    // debug begin
    $sDebugFile=$_SERVER['CONTEXT_DOCUMENT_ROOT']."/debug/dd-".date("Y-m-d").".txt";
    file_put_contents($sDebugFile, "BEGIN : ".date("H:i:s")."\n", FILE_APPEND);
    file_put_contents($sDebugFile, "In the VirtualMachineCost Class for the Org id ".$org_id."\n", FILE_APPEND);
    // debug end
    // get the cost defined for the org
    $oOrg = MetaModel::GetObject('Organization', $org_id);
    $aOutCost = array('vm_base_cost' => 0, 'vm_cpu_cost' => 0, 'vm_ram_cost' => 0, 'vm_disk_cost' => 0);
    if (is_object($oOrg))
    {
      // Collect the cost the the organization of the VM
      $sOQL = "SELECT BrickCost WHERE org_id = :org";
      $oCostSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL),array(),array('org' => $org_id));
      while ($oCost = $oCostSet->Fetch())
      {
        if ($oCost->Get('vm_base_cost') != 0)
        {
          $aOutCost += ['vm_base_cost' => $oCost->Get('vm_base_cost')];
        }
        if ($oCost->Get('vm_cpu_cost') != 0)
        {
          $aOutCost += ['vm_cpu_cost' => $oCost->Get('vm_cpu_cost')];
        }
        if ($oCost->Get('vm_ram_cost') != 0)
        {
          $aOutCost += ['vm_ram_cost' => $oCost->Get('vm_ram_cost')];
        }
        if ($oCost->Get('vm_disk_cost') != 0)
        {
          $aOutCost += ['vm_disk_cost' => $oCost->Get('vm_disk_cost')];
        }
      }
    }
    // debug begin
    file_put_contents($sDebugFile, "Contents of the object \$oOrg (org info)\n", FILE_APPEND);
    file_put_contents($sDebugFile, print_r($oOrg, true), FILE_APPEND);
    file_put_contents($sDebugFile, "Contents of the array \$aOutCost (list of costs for org)\n", FILE_APPEND);
    file_put_contents($sDebugFile, print_r($aOutCost, true), FILE_APPEND);
    // debug end
    return $aOutCost;
  }
  /* public function CalculateVMCost()
  {
    $this->Set('vm_cost', '15 €');
  }*/
  /* public function OnUpdate()
  {
    parent::OnUpdate();
    $this->CalculateVMCost();
  } */
  /* public function GetInitialStateAttributeFlags($sAttCode, &$aReasons = array())
  {
    // Hide the calculated field in object creation form
    if (($sAttCode == 'vm_cost'))
      return(OPT_ATT_HIDDEN | parent::GetInitialStateAttributeFlags($sAttCode, $aReasons));
    return parent::GetInitialStateAttributeFlags($sAttCode, $aReasons);
  }*/
  /* public function GetAttributeFlags($sAttCode, &$aReasons = array(), $sTargetState = '')
  {
    // Force the computed field to be read-only, preventing it to be written
    if (($sAttCode == 'vm_cost'))
      return(OPT_ATT_READONLY | parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState));
    return parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState);
  }*/
}
