<?php
// auto-generated by sfPropelCrud
// date: 2012/11/21 21:07:46
?>
<h1>zMlmMemberApplication</h1>

<table>
<thead>
<tr>
  <th>Member</th>
  <th>Full name</th>
  <th>Email</th>
  <th>Contact</th>
  <th>Qq</th>
  <th>Gender</th>
  <th>Country</th>
  <th>Dob</th>
  <th>Status code</th>
  <th>Created by</th>
  <th>Created on</th>
  <th>Updated by</th>
  <th>Updated on</th>
</tr>
</thead>
<tbody>
<?php foreach ($mlm_member_applications as $mlm_member_application): ?>
<tr>
    <td><?php echo link_to($mlm_member_application->getMemberId(), 'zMlmMemberApplication/show?member_id='.$mlm_member_application->getMemberId()) ?></td>
      <td><?php echo $mlm_member_application->getFullName() ?></td>
      <td><?php echo $mlm_member_application->getEmail() ?></td>
      <td><?php echo $mlm_member_application->getContact() ?></td>
      <td><?php echo $mlm_member_application->getQq() ?></td>
      <td><?php echo $mlm_member_application->getGender() ?></td>
      <td><?php echo $mlm_member_application->getCountry() ?></td>
      <td><?php echo $mlm_member_application->getDob() ?></td>
      <td><?php echo $mlm_member_application->getStatusCode() ?></td>
      <td><?php echo $mlm_member_application->getCreatedBy() ?></td>
      <td><?php echo $mlm_member_application->getCreatedOn() ?></td>
      <td><?php echo $mlm_member_application->getUpdatedBy() ?></td>
      <td><?php echo $mlm_member_application->getUpdatedOn() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'zMlmMemberApplication/create') ?>