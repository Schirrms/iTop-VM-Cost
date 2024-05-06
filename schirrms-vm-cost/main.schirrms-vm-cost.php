<?php

/* Complementary classes to automate the cost value display
 *
 */

class VirtualMachineCost 
{
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
