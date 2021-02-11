<?php

namespace ZooplaRealTime\Values;

class LifeCycleStatus extends ValuesBase
{
	const Available = 'available';
	const UnderOffer = 'under_offer';
	const SoldSubjectToContract = 'sold_subject_to_contract';
	const Sold = 'sold';
	const LetAgreed = 'let_agreed';
	const Let = 'let';
}