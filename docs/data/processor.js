#!/usr/bin/env node

const readline = require('readline');

const rl = readline.createInterface({ input: process.stdin });

const ROLE = 1;
const DESC = 2;
const RESP = 3;
const SKILLS = 4;

const ROLE_SEP = '----';
const RESP_SEP = 'Responsibilities';
const SKILLS_SEP = 'Recommended Skills';

let state = ROLE;

const roles = [];
let currRole;

function pushRole() {
	roles.push(currRole);
	resetCurrRole();
}

function resetCurrRole() {
	currRole = {
		roleDescription: [],
		responsibilities: [],
		skills: []
	};
}
resetCurrRole();

rl.on('line', (line) => {
	const l = line.trim();
	if (l === '') return;
	switch (state) {
		case ROLE:
			currRole.roleName = l;
			state = DESC;
			break;
		case DESC:
			if (l === RESP_SEP) {
				state = RESP;
				return;
			}
			currRole.roleDescription.push(l);
			break;
		case RESP:
			if (l === SKILLS_SEP) {
				state = SKILLS;
				return;
			}
			currRole.responsibilities.push(l);
			break;
		case SKILLS:
			if (l === ROLE_SEP) {
				pushRole();
				state = ROLE;
				return;
			}
			currRole.skills.push(l);
			break;
	}
});

rl.on('close', () => {
  console.log(JSON.stringify(roles));
});