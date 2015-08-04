<?php
class SettingsPageTest extends PHPUnit_Framework_TestCase
{
  public function testEmptyGeneratedHtml()
  {
    $settings_page = new SettingsPage(array());
    $expectedHtml = <<<END
<h1>Intercom Settings</h1>

<div id="intercom-settings-container" class="postbox-container">
  <form method="post" action="$action">
    <table class="form-table">
      <tbody>
        <tr>
          <td><b>App ID</b></td>
          <td><input name="app_id" type="text" value="" placeholder="App ID"></td>
        </tr>
        <tr>
          <td><b>Secret</b></td>
          <td><input name="secret" type="text" value="" placeholder="Secret"></td>
        </tr>
      </tbody>
    </table>
    <input type="submit" value="Save">
  </form>
</div>
END;
    $this->assertEquals($expectedHtml, $settings_page->html());
  }

  public function testGeneratedHtml()
  {
    $settings_page = new SettingsPage(array("app_id" => "foo", "secret" => "bar"));
    $expectedHtml = <<<END
<h1>Intercom Settings</h1>

<div id="intercom-settings-container" class="postbox-container">
  <form method="post" action="$action">
    <table class="form-table">
      <tbody>
        <tr>
          <td><b>App ID</b></td>
          <td><input name="app_id" type="text" value="foo" placeholder="App ID"></td>
        </tr>
        <tr>
          <td><b>Secret</b></td>
          <td><input name="secret" type="text" value="bar" placeholder="Secret"></td>
        </tr>
      </tbody>
    </table>
    <input type="submit" value="Save">
  </form>
</div>
END;
    $this->assertEquals($expectedHtml, $settings_page->html());
  }
}
