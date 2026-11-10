// Google Apps Script: receives menu photos from the besb admin and saves them to Drive.
// Setup: script.google.com > New project > paste this > set SECRET >
// Deploy > New deployment > Web app, Execute as: Me, Who has access: Anyone.
// Put the Web app URL and SECRET into config/gdrive_key.php.

const FOLDER_ID = '1KnTuPGv9d-c7PbdqwUFsOD5OTImDQsOR';
const SECRET = 'CHANGE-ME-long-random-string';

function doPost(e) {
  const p = e.parameter;
  if (!p.secret || p.secret !== SECRET) return json({ error: 'forbidden' });

  const blob = Utilities.newBlob(Utilities.base64Decode(p.data), p.mime, p.name);
  const file = DriveApp.getFolderById(FOLDER_ID).createFile(blob);
  file.setSharing(DriveApp.Access.ANYONE_WITH_LINK, DriveApp.Permission.VIEW);
  return json({ id: file.getId() });
}

function json(obj) {
  return ContentService.createTextOutput(JSON.stringify(obj)).setMimeType(ContentService.MimeType.JSON);
}
