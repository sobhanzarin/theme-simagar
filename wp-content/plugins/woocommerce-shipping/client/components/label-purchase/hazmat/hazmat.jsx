/**
 * External dependencies
 */
import {
	Button,
	Dropdown,
	MenuItemsChoice,
	RadioControl,
	BaseControl,
	ToggleControl,
	SelectControl,
	Flex,
	__experimentalText as Text,
	__experimentalSpacer as Spacer,
} from '@wordpress/components';
import { chevronDown } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';
import { createInterpolateElement, useEffect } from '@wordpress/element';
import { Link } from '@woocommerce/components';
import clsx from 'clsx';

/**
 * Internal dependencies
 */
import { uspsHazmatCategories } from './usps-hazmat-categories';
import { useLabelPurchaseContext } from 'context/label-purchase';
import { recordEvent } from 'utils/tracks';
import { FOCUS_AREA_HAZMAT } from 'components/label-purchase/essential-details/constants';
import { Tooltip } from '../design-next/internal/tooltip';
import Notification from 'components/notification';

const hazmatCategories = [];
Object.entries( uspsHazmatCategories ).forEach( ( [ value, label ] ) => {
	hazmatCategories.push( {
		label,
		value,
	} );
} );

const DropdownSelectedOption = ( { value } ) => {
	const selectedLabel = hazmatCategories.find(
		( category ) => category.value === value
	).label;
	return (
		<section>
			<Text truncate title={ selectedLabel }>
				{ selectedLabel }
			</Text>
		</section>
	);
};

export const Hazmat = () => {
	const {
		hazmat: { getShipmentHazmat, setShipmentHazmat },
		rates: { updateRates },
		labels: { hasPurchasedLabel },
		essentialDetails: { focusArea, resetFocusArea },
		nextDesign,
	} = useLabelPurchaseContext();

	const hazmatState = getShipmentHazmat();

	const handleHazmatChange = ( value ) => {
		recordEvent( 'label_purchase_hazmat_toggled', { hazmat: value } );
		const isHazmat = value === 'yes';
		const currentCategory = hazmatState?.category || '';

		setShipmentHazmat( isHazmat, currentCategory );

		if ( ! isHazmat ) {
			resetFocusArea();
		}
	};

	const handleHazmatCategoryChange = ( value ) => {
		setShipmentHazmat( hazmatState?.isHazmat || false, value );
		recordEvent( 'label_purchase_hazmat_category_selected', {
			hazmat_category: value,
		} );
		resetFocusArea();
	};

	/*
	 * The effect ensures that rates are updated when hazmat state changes.
	 *
	 * We intentionally omit updateRates from the deps array because:
	 * 1. It would cause unnecessary rate updates when other package details change.
	 * 2. updateRates is only used as a side effect and doesn't affect the effect's logic
	 * 3. The hazmat state values are the only relevant dependencies for triggering rate updates
	 */
	useEffect( () => {
		if ( hazmatState?.isHazmat && ! hazmatState?.category ) {
			// Don't update rates if "is HAZMAT" was specified but not the category.
			return;
		}

		updateRates();
	}, [ hazmatState?.isHazmat, hazmatState?.category ] ); // eslint-disable-line react-hooks/exhaustive-deps

	return (
		<div>
			{ nextDesign ? (
				<Spacer marginBottom={ 4 }>
					<ToggleControl
						checked={ hazmatState?.isHazmat }
						onChange={ () =>
							handleHazmatChange(
								hazmatState?.isHazmat ? 'no' : 'yes'
							)
						}
						label={
							<Flex
								direction="row"
								justify="flex-start"
								align="flex-start"
								gap={ 1 }
							>
								<Text>
									{ __(
										'Shipment contains hazardous materials.',
										'woocommerce-shipping'
									) }
								</Text>
								<Tooltip
									text={ __(
										'Examples include batteries, dry ice, flammable liquids, aerosol sprays, airbags, fireworks, gasoline, lighters, lithium batteries, matches, paint, perfume, camping stoves, radioactive materials, solvents, and more.',
										'woocommerce-shipping'
									) }
								>
									<Text
										style={ {
											borderBottom: '1px dashed',
										} }
										size={ 13 }
									>
										{ __(
											'See examples',
											'woocommerce-shipping'
										) }
									</Text>
								</Tooltip>
							</Flex>
						}
						disabled={ hasPurchasedLabel( false ) }
						__nextHasNoMarginBottom
					/>
				</Spacer>
			) : (
				<RadioControl
					className="hazmat-radio-control"
					label={ __(
						'Are you shipping dangerous goods or hazardous materials?',
						'woocommerce-shipping'
					) }
					selected={ hazmatState?.isHazmat ? 'yes' : 'no' }
					options={ [
						{
							label: __( 'No', 'woocommerce-shipping' ),
							value: 'no',
						},
						{
							label: __( 'Yes', 'woocommerce-shipping' ),
							value: 'yes',
						},
					] }
					onChange={ handleHazmatChange }
					disabled={ hasPurchasedLabel( false ) }
				/>
			) }

			{ hazmatState?.isHazmat && (
				<div>
					{ nextDesign ? (
						<Flex direction={ 'column' } gap={ 4 } marginTop={ 4 }>
							<SelectControl
								label={ __(
									'Hazardous material category',
									'woocommerce-shipping'
								) }
								hideLabelFromVision
								value={ hazmatState?.category || '' }
								options={ [
									{
										label: __(
											'Select a hazardous or dangerous material category',
											'woocommerce-shipping'
										),
										value: '',
									},
									...hazmatCategories,
								] }
								onChange={ handleHazmatCategoryChange }
								help={ __(
									'We automatically detected the hazardous material types from your order.',
									'woocommerce-shipping'
								) }
								required
								disabled={ hasPurchasedLabel( false ) }
								__next40pxDefaultSize
								__nextHasNoMarginBottom
							/>

							<Notification
								title={ __(
									'Important requirements',
									'woocommerce-shipping'
								) }
							>
								<ul
									style={ {
										listStylePosition: 'inside',
										paddingInlineStart: 0,
										margin: 0,
									} }
								>
									<li>
										{ __(
											'Must be shipped in separate packages.',
											'woocommerce-shipping'
										) }
									</li>
									<li>
										{ __(
											'Special labeling and documentation required.',
											'woocommerce-shipping'
										) }
									</li>
									<li>
										{ __(
											'Additional fees and restrictions may apply.',
											'woocommerce-shipping'
										) }
									</li>
								</ul>
								<Text>
									{ createInterpolateElement(
										__(
											'Learn more about packaging and shipping instructions <a>here</a>.',
											'woocommerce-shipping'
										),
										{
											a: (
												<Link
													href="https://www.uspsdelivers.com/hazmat-shipping-safety/"
													target="_blank"
													rel="noreferrer"
												/>
											),
										}
									) }
								</Text>
							</Notification>
						</Flex>
					) : (
						<>
							<p>
								{ __(
									'Potentially hazardous material includes items such as batteries, dry ice, flammable liquids, aerosols, ammunition, fireworks, nail polish, perfume, paint, solvents, and more. Hazardous items must ship in separate packages.',
									'woocommerce-shipping'
								) }
							</p>
							<p>
								{ createInterpolateElement(
									__(
										"Learn how to securely package, label, and ship HAZMAT through USPS® at <a1>www.usps.com/hazmat</a1>. Determine your product's mailability using the <a2>USPS HAZMAT Search Tool</a2>.",
										'woocommerce-shipping'
									),
									{
										a1: (
											<Link
												target="_blank"
												href="https://www.usps.com/hazmat"
												type="external"
												rel="noreferrer"
											/>
										),
										a2: (
											<Link
												target="_blank"
												href="https://pe.usps.com/hazmat/index"
												type="external"
												rel="noreferrer"
											/>
										),
									}
								) }
							</p>
							<p>
								{ createInterpolateElement(
									__(
										'WooCommerce Shipping does not currently support HAZMAT shipments through <a>DHL Express</a>.',
										'woocommerce-shipping'
									),
									{
										a: (
											<Link
												type="external"
												target="_blank"
												href="https://www.dhl.com/us-en/home/express.html"
												rel="noreferrer"
											/>
										),
									}
								) }
							</p>

							<Dropdown
								className="hazmat-category-dropdown"
								contentClassName="hazmat-categories"
								popoverProps={ {
									placement: 'bottom-start',
									noArrow: false,
									resize: true,
									shift: true,
									inline: true,
								} }
								renderToggle={ ( { isOpen, onToggle } ) => (
									<BaseControl
										help={ __(
											'Selecting a hazardous or dangerous material category is required.',
											'woocommerce-shipping'
										) }
										className={ {
											'has-error': ! Boolean(
												hazmatState?.category
											),
										} }
										required={ true }
									>
										<Button
											onClick={ onToggle }
											aria-expanded={ isOpen }
											isSecondary
											icon={ chevronDown }
											iconPosition="right"
											className={ clsx(
												'hazmat-category__toggle',
												{
													'has-error':
														focusArea ===
															FOCUS_AREA_HAZMAT &&
														! Boolean(
															hazmatState?.category
														),
												}
											) }
											disabled={ hasPurchasedLabel(
												false
											) }
										>
											{ hazmatState?.category === '' ? (
												__(
													'Select a hazardous or dangerous material category',
													'woocommerce-shipping'
												)
											) : (
												<section>
													<DropdownSelectedOption
														value={
															hazmatState?.category ||
															''
														}
													/>
												</section>
											) }
										</Button>
									</BaseControl>
								) }
								renderContent={ ( { onToggle } ) => (
									<MenuItemsChoice
										choices={ hazmatCategories }
										onSelect={ ( value ) => {
											handleHazmatCategoryChange( value );
											onToggle();
										} }
										value={ hazmatState?.category || '' }
									/>
								) }
							/>
						</>
					) }
				</div>
			) }
		</div>
	);
};
