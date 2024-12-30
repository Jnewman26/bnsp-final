import static com.kms.katalon.core.checkpoint.CheckpointFactory.findCheckpoint
import static com.kms.katalon.core.testcase.TestCaseFactory.findTestCase
import static com.kms.katalon.core.testdata.TestDataFactory.findTestData
import static com.kms.katalon.core.testobject.ObjectRepository.findTestObject
import static com.kms.katalon.core.testobject.ObjectRepository.findWindowsObject
import com.kms.katalon.core.checkpoint.Checkpoint as Checkpoint
import com.kms.katalon.core.cucumber.keyword.CucumberBuiltinKeywords as CucumberKW
import com.kms.katalon.core.mobile.keyword.MobileBuiltInKeywords as Mobile
import com.kms.katalon.core.model.FailureHandling as FailureHandling
import com.kms.katalon.core.testcase.TestCase as TestCase
import com.kms.katalon.core.testdata.TestData as TestData
import com.kms.katalon.core.testng.keyword.TestNGBuiltinKeywords as TestNGKW
import com.kms.katalon.core.testobject.TestObject as TestObject
import com.kms.katalon.core.webservice.keyword.WSBuiltInKeywords as WS
import com.kms.katalon.core.webui.keyword.WebUiBuiltInKeywords as WebUI
import com.kms.katalon.core.windows.keyword.WindowsBuiltinKeywords as Windows
import internal.GlobalVariable as GlobalVariable
import org.openqa.selenium.Keys as Keys

WebUI.openBrowser('')

WebUI.navigateToUrl('http://localhost:8000/login/user')

WebUI.setText(findTestObject('Object Repository/Page_Login User/input_Sign In User_username'), 'admin')

WebUI.setEncryptedText(findTestObject('Object Repository/Page_Login User/input_Sign In User_password'), 'RAIVpflpDOg=')

WebUI.click(findTestObject('Object Repository/Page_Login User/button_Login'))

WebUI.click(findTestObject('Object Repository/Page_Library BNSP/span_Category'))

WebUI.click(findTestObject('Object Repository/Page_Library BNSP/i_bisnis_fad fa-pen-to-square text-white'))

WebUI.setText(findTestObject('Object Repository/Page_Library BNSP/input_Category Name_category_name'), 'motivasi')

WebUI.click(findTestObject('Object Repository/Page_Library BNSP/button_Save changes'))

WebUI.closeBrowser()

